<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Crear Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" class="border px-3 py-2 w-full">
        <textarea name="descripcion" placeholder="Descripción" class="border px-3 py-2 w-full"></textarea>
        <input type="number" name="precio" placeholder="Precio" class="border px-3 py-2 w-full" step="0.01">
        <input type="number" name="stock" placeholder="Stock" class="border px-3 py-2 w-full">

<select name="categorias[]" class="border p-2 producto-select" required onchange="actualizarPrecio(this)">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">

                        </option>
                    @endforeach
                </select>

         <div>
                <label for="image_product" class="block text-base font-semibold text-gray-800 mb-2">Seleccionar imagen:</label>
                <input type="file" name="image_product" id="image_product"
                    class="w-full border border-gray-200 rounded-xl shadow p-3 bg-gray-50/50">
            </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>

</x-app-layout>
