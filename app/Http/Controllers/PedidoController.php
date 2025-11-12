<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('proveedor')->get();
        return view('admin/pedidos/index', compact('pedidos'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('admin/pedidos/create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'proveedor_id' => 'required|exists:proveedors,id',
            'fecha' => 'required|date',
            'estado' => 'required|string|max:255',
        ]);

        Pedido::create($request->only('nombre', 'proveedor_id', 'fecha', 'estado'));

        return redirect()->route('pedidos.index')->with('success', 'Pedido creado correctamente.');
    }

    public function edit(Pedido $pedido)
    {
        $proveedores = Proveedor::all();
        return view('admin/pedidos/edit', compact('pedido', 'proveedores'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'proveedor_id' => 'required|exists:proveedors,id',
            'fecha' => 'required|date',
            'estado' => 'required|string|max:255',
        ]);

        $pedido->update($request->only('nombre', 'proveedor_id', 'fecha', 'estado'));

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado correctamente.');
    }


    public function show(Pedido $pedido)
{
    // Cargar proveedor y productos relacionados
    $pedido->load('proveedor', 'productos');

    return view('admin/pedidos/show', compact('pedido'));
}
}
