<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Categoría</h1>
    <form action="{{ route('categorias.update', $categoria) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="nombre" value="{{ $categoria->nombre }}" class="border px-3 py-2 w-full" placeholder="Nombre de la categoría">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Guardar Cambios
        </button>
    </form>
</div>
</x-app-layout>
