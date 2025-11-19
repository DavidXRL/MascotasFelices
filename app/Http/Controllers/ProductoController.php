<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Listado de productos con categoria_nombre
    public function index()
    {
        $productos = Producto::with('categoria')->get()->map(function($producto) {
            $producto->categoria_nombre = $producto->categoria ? $producto->categoria->categoria_nombre : 'Sin categoría';
            return $producto;
        });

        return view('admin.productos.index', compact('productos'));
    }

    // Vista de bienvenida con productos y últimas ventas
    public function welcome()
    {
        $productos = Producto::where('stock', '>', 0)->get();
        $ventas = \App\Models\Venta::with('cliente', 'productos')->latest()->take(5)->get();
        return view('welcome', compact('productos', 'ventas'));
    }

    // Formulario de creación
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.productos.create', compact('categorias'));
    }

    // Guardar producto
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'image_product' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Subida de imagen
        if ($request->hasFile('image_product')) {
            $image = $request->file('image_product');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image/products'), $filename);
            $validatedData['image_product'] = $filename;
        }

        Producto::create($validatedData);

        return redirect()
            ->route('productos.index')
            ->with('status', 'Producto registrado correctamente.');
    }

    // Formulario de edición
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    // Actualizar producto
    public function update(Request $request, Producto $producto)
    {
  $validatedData = $request->validate([
    'nombre' => 'required|string|max:255',
    'descripcion' => 'nullable|string',
    'precio' => 'required|numeric',
    'stock' => 'required|integer',
    'categoria_id' => 'required|exists:categorias,id',
    'image_product' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
]);


        // Subida de nueva imagen si se envía
        if ($request->hasFile('image_product')) {
            // Eliminar imagen anterior
            if ($producto->image_product && file_exists(public_path('image/products/' . $producto->image_product))) {
                unlink(public_path('image/products/' . $producto->image_product));
            }

            $image = $request->file('image_product');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image/products'), $filename);
            $validatedData['image_product'] = $filename;
        }

        $producto->update($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar producto
    public function destroy(Producto $producto)
    {
        if ($producto->image_product && file_exists(public_path('image/products/' . $producto->image_product))) {
            unlink(public_path('image/products/' . $producto->image_product));
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }

    // Tienda: productos con stock > 0
    public function tienda()
    {
        $productos = Producto::where('stock', '>', 0)->get();
        return view('productos.client', compact('productos'));
    }
}
