<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin/categorias/index', compact('categorias'));
    }

    public function create()
    {
        return view('admin/categorias/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria_nombre' => 'required|unique:categorias',
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente.');
    }

    public function edit(Categoria $categoria)
    {
        return view('admin/categorias/edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'categoria_nombre' => 'required|unique:categorias,categoria_nombre,' . $categoria->id,
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }

    public function show($id)
     {
          $categoria = Categoria::with('productos')->findOrFail($id);
          return view('admin/categorias/show', compact('categoria'));
     }
}
