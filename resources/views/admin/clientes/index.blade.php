<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Clientes</h1>

    {{-- Botón para agregar nuevo cliente --}}
    <a href="{{ route('clientes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
        Nuevo Cliente
    </a>

    {{-- Tabla de clientes --}}
    <table class="min-w-full mt-4 bg-white border">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">Nombre</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Teléfono</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cliente)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $cliente->nombre }}</td>
                    <td class="px-4 py-2 border">{{ $cliente->email }}</td>
                    <td class="px-4 py-2 border">{{ $cliente->telefono }}</td>
                    <td class="px-4 py-2 border space-x-1">
                        {{-- Ver cliente (puntos + historial de ventas) --}}
                        <a href="{{ route('clientes.show', $cliente) }}"
                           class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">
                            Ver
                        </a>

                        {{-- Editar cliente --}}
                        <a href="{{ route('clientes.edit', $cliente) }}"
                           class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500">
                            Editar
                        </a>

                        {{-- Eliminar cliente --}}
                        <form action="{{ route('clientes.destroy', $cliente) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?')">
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
                    <td colspan="4" class="text-center py-4 text-gray-500">
                        No hay clientes registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>
