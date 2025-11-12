<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function index() {
        $proveedores = Proveedor::all();
        return view('admin/proveedores/index', compact('proveedores'));
    }

    public function show(Proveedor $proveedor) {
        $proveedor->load('pedidos.productos'); // carga pedidos y sus productos
        return view('admin/proveedores/show', compact('proveedor'));
    }

    public function create() {
        return view('admin/proveedores/create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre'=>'required|string',
            'email'=>'required|email',
            'telefono'=>'required|string'
        ]);

        Proveedor::create($request->all());
        return redirect()->route('proveedores.index')->with('success','Proveedor creado.');
    }

    public function edit(Proveedor $proveedor) {
        return view('admin/proveedores/edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor) {
        $request->validate([
            'nombre'=>'required|string',
            'email'=>'required|email',
            'telefono'=>'required|string'
        ]);

        $proveedor->update($request->all());
        return redirect()->route('proveedores.index')->with('success','Proveedor actualizado.');
    }

    public function destroy(Proveedor $proveedor) {
        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('success','Proveedor eliminado.');
    }
}
