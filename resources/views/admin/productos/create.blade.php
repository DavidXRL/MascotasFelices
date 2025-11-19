<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Crear Producto</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre" class="border px-3 py-2 w-full">
        <textarea name="descripcion" placeholder="Descripción" class="border px-3 py-2 w-full">{{ old('descripcion') }}</textarea>
        <input type="number" name="precio" value="{{ old('precio') }}" placeholder="Precio" class="border px-3 py-2 w-full" step="0.01">
        <input type="number" name="stock" value="{{ old('stock') }}" placeholder="Stock" class="border px-3 py-2 w-full">

        <div class="mb-4">
            <label>Categoria</label>
            <select name="categoria_id" class="border px-3 py-2 w-full" required>
                <option value="">Seleccione Categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if(old('categoria_id') == $categoria->id) selected @endif>
                        {{ $categoria->categoria_nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image_product" class="block text-base font-semibold text-gray-800 mb-2">Seleccionar imagen:</label>
            <input type="file" name="image_product" id="image_product"
                   class="w-full border border-gray-200 rounded-xl shadow p-3 bg-gray-50/50">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>
</x-app-layout>
