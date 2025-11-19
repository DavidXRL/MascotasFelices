<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-center">Crear Categoría</h1>
    <form action="{{ route('categorias.store') }}" method="POST" class="space-y-4">
        @csrf

        <input type="text" name="categoria_nombre" placeholder="Nombre de la categoría" class="border px-3 py-2 w-full">

        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Guardar Categoría
            </button>
        </div>
    </form>
</div>
</x-app-layout>
