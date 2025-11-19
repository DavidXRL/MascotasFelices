<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-center">Editar Categoría</h1>
    <form action="{{ route('categorias.update', $categoria) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="categoria_nombre" value="{{ old('categoria_nombre', $categoria->categoria_nombre) }}" class="border px-3 py-2 w-full" placeholder="Nombre de la categoría">
<div class="flex justify-center">
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
</div>
    </form>
</div>
</x-app-layout>
