<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente','productos')->latest()->get();
        return view('admin/ventas/index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('admin/ventas/create', compact('clientes','productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id'=>'required|exists:clientes,id',
            'fecha'=>'required|date',
            'total'=>'required|numeric|min:0',
            'metodo_pago'=>'required|string',
            'productos'=>'required|array|min:1',
            'cantidades'=>'required|array|min:1',
            'precios'=>'required|array|min:1',
        ]);

        DB::beginTransaction();
        try {
            $venta = Venta::create($request->only('cliente_id','fecha','total','metodo_pago'));

            foreach ($request->productos as $i => $productoId) {
                $venta->productos()->attach($productoId, [
                    'cantidad'=>$request->cantidades[$i],
                    'precio'=>$request->precios[$i],
                ]);

                // Actualizar stock
                $producto = Producto::find($productoId);
                $producto->stock -= $request->cantidades[$i];
                $producto->save();
            }

            // Puntos de fidelidad
            $cliente = $venta->cliente;
            $puntos = floor($request->total / 100);
            $cliente->puntos_fidelidad += $puntos;
            $cliente->save();

            DB::commit();
            return redirect()->route('ventas.index')->with('success', "Venta registrada. Cliente ganó {$puntos} puntos.");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error'=>$e->getMessage()])->withInput();
        }
    }

    public function edit(Venta $venta)
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        $venta->load('productos');
        return view('admin/ventas/edit', compact('venta','clientes','productos'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'cliente_id'=>'required|exists:clientes,id',
            'fecha'=>'required|date',
            'total'=>'required|numeric|min:0',
            'metodo_pago'=>'required|string',
            'productos'=>'required|array|min:1',
            'cantidades'=>'required|array|min:1',
            'precios'=>'required|array|min:1',
        ]);

        DB::beginTransaction();
        try {
            $venta->productos()->detach(); // eliminar productos viejos
            $venta->update($request->only('cliente_id','fecha','total','metodo_pago'));

            foreach ($request->productos as $i => $productoId) {
                $venta->productos()->attach($productoId, [
                    'cantidad'=>$request->cantidades[$i],
                    'precio'=>$request->precios[$i],
                ]);
            }

            DB::commit();
            return redirect()->route('ventas.index')->with('success','Venta actualizada correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error'=>$e->getMessage()])->withInput();
        }
    }

    public function destroy(Venta $venta)
    {
        $venta->productos()->detach();
        $venta->delete();
        return redirect()->route('ventas.index')->with('success','Venta eliminada.');
    }


    public function pdf(Venta $venta)
    {
    $venta->load('cliente', 'productos');
    $pdf = Pdf::loadView('ventas.pdf', compact('venta'));
    return $pdf->download("venta_{$venta->id}.pdf");
    }
}
