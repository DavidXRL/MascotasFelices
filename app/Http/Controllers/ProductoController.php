<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('/admin/productos/index', compact('productos'));
    }

  public function welcome()
    {
        $productos = Producto::where('stock', '>', 0)->get();
        $ventas = \App\Models\Venta::with('cliente','productos')->latest()->take(5)->get();
        return view('welcome', compact('productos','ventas'));
    }

    public function create()
    {
        $productos = Producto::pluck('id', 'nombre');
        return view('admin/productos/create', compact('productos'));
    }

public function store(Request $request)
{
    // Validar campos
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric',
        'stock' => 'required|integer',
        'categoria' => 'required|string|max:255',
        'image_product' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Subida de imagen
    if ($request->hasFile('image_product')) {
        $image = $request->file('image_product');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('image/products'), $filename);
        $validatedData['image_product'] = $filename;
    }

    // Crear producto
    Producto::create($validatedData);

    return redirect()
        ->route('productos.index')
        ->with('status', 'Producto registrado correctamente.');
}




    public function edit(Producto $producto)
    {
        return view('/admin/productos/edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria' => 'required'
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        // Eliminar imagen si existe
        if ($producto->image_product && file_exists(public_path('image/products/' . $producto->image_product))) {
            unlink(public_path('image/products/' . $producto->image_product));
        }

        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }

   public function tienda()
{
    $productos = \App\Models\Producto::where('stock', '>', 0)->get();
    return view('productos.client', compact('productos'));
}


}
