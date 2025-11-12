<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Crear Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" class="border px-3 py-2 w-full">
        <textarea name="descripcion" placeholder="Descripción" class="border px-3 py-2 w-full"></textarea>
        <input type="number" name="precio" placeholder="Precio" class="border px-3 py-2 w-full" step="0.01">
        <input type="number" name="stock" placeholder="Stock" class="border px-3 py-2 w-full">
        <input type="text" name="categoria" placeholder="Categoría" class="border px-3 py-2 w-full">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>

</x-app-layout>
