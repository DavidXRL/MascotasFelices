<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Producto</h1>
    <form action="{{ route('productos.update', $producto) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="text" name="nombre" value="{{ $producto->nombre }}" class="border px-3 py-2 w-full">
        <textarea name="descripcion" class="border px-3 py-2 w-full">{{ $producto->descripcion }}</textarea>
        <input type="number" name="precio" value="{{ $producto->precio }}" step="0.01" class="border px-3 py-2 w-full">
        <input type="number" name="stock" value="{{ $producto->stock }}" class="border px-3 py-2 w-full">
        <input type="text" name="categoria" value="{{ $producto->categoria }}" class="border px-3 py-2 w-full">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
    </form>
</div>

</x-app-layout>
