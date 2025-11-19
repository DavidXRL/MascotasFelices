<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Encabezado -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
            <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Categorías</h1>
            <a href="{{ route('categorias.create') }}"
               class="mt-3 sm:mt-0 inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow hover:shadow-lg transition focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                <!-- Heroicon: plus -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
                Nueva categoría
            </a>
        </div>

        <!-- Tabla / Cards -->
        <div class="bg-white rounded-2xl shadow border border-gray-100 overflow-hidden">
            <!-- Desktop -->
            <div class="hidden sm:block overflow-x-auto">
                <table class="min-w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Categoría
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($categorias as $categoria)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-800 font-medium">
                                    {{ $categoria->categoria_nombre }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('categorias.edit', $categoria) }}"
                                           class="inline-flex items-center gap-1 px-3 py-1.5 rounded-md bg-amber-100 text-amber-700 hover:bg-amber-200 transition">
                                            <!-- Heroicon: pencil -->
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.5L14.732 3.732z"/>
                                            </svg>
                                            Editar
                                        </a>

                                        <form action="{{ route('categorias.destroy', $categoria) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?')"
                                              class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center gap-1 px-3 py-1.5 rounded-md bg-rose-100 text-rose-700 hover:bg-rose-200 transition">
                                                <!-- Heroicon: trash -->
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2"
                                    class="px-6 py-10 text-center text-gray-500">
                                    No hay categorías registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Móvil: cards -->
            <div class="sm:hidden divide-y divide-gray-100">
                @forelse($categorias as $categoria)
                    <div class="p-4 flex items-center justify-between">
                        <p class="text-gray-800 font-medium">{{ $categoria->categoria_nombre }}</p>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('categorias.edit', $categoria) }}"
                               class="p-2 rounded-lg bg-amber-100 text-amber-700 hover:bg-amber-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.5L14.732 3.732z"/>
                                </svg>
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?')"
                                  class="inline">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="p-2 rounded-lg bg-rose-100 text-rose-700 hover:bg-rose-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="p-6 text-center text-gray-500">No hay categorías registradas.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
