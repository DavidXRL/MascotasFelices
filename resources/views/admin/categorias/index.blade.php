<x-app-layout>
<div class="container mx-auto p-6 text-center">
    <h1 class="text-3xl font-bold mb-4">Categorías</h1>

    {{-- Botón para agregar nueva categoría --}}
    <a href="{{ route('categorias.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Agregar Nueva Categoría</a>
    {{-- Tabla de categorías --}}
    <table class="min-w-full mt-4 bg-white border">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">Categoría</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @forelse($categorias as $categoria)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $categoria->categoria_nombre }}</td>
                    <td class="px-4 py-2 border space-x-1">
                        {{-- Editar categoría --}}
                        <a href="{{ route('categorias.edit', $categoria) }}"
                           class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500">
                            Editar
                        </a>

                        {{-- Eliminar categoría --}}
                        <form action="{{ route('categorias.destroy', $categoria) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 px-2 py-1 text-white rounded hover:bg-red-600">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center py-4 text-gray-500">
                        No hay categorías registradas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>
