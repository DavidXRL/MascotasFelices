<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Producto</h1>

    <form action="{{ route('productos.update', $producto) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="border px-3 py-2 w-full">
        <textarea name="descripcion" class="border px-3 py-2 w-full">{{ old('descripcion', $producto->descripcion) }}</textarea>
        <input type="number" name="precio" value="{{ old('precio', $producto->precio) }}" step="0.01" class="border px-3 py-2 w-full">
        <input type="number" name="stock" value="{{ old('stock', $producto->stock) }}" class="border px-3 py-2 w-full">

        <div class="mb-4">
            <label>Categoria</label>
            <select name="categoria_id" class="border px-3 py-2 w-full" required>
                <option value="">Seleccione Categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        @if(old('categoria_id', $producto->categoria_id) == $categoria->id) selected @endif>
                        {{ $categoria->categoria_nombre }}
                    </option>
                @endforeach
            </select>
        </div>

       <div class="flex justify-center">
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
</div>
    </form>
</div>
</x-app-layout>
