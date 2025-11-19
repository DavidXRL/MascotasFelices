<x-app-layout>


    <div class="container mx-auto p-6 text-center">
        <h1 class="text-2xl font-bold mb-4">Pedidos</h1>

        <a href="{{ route('pedidos.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Agregar Pedido
        </a>

        <table class="min-w-full border-collapse border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Proveedor</th>
                    <th class="px-4 py-2 border">Fecha</th>
                    <th class="px-4 py-2 border">Estado</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td class="px-4 py-2 border">{{ $pedido->nombre }}</td>
                        <td class="px-4 py-2 border">{{ $pedido->proveedor->nombre }}</td>
                        <td class="px-4 py-2 border">{{ $pedido->fecha }}</td>
                        <td class="px-4 py-2 border">{{ $pedido->estado }}</td>
                        <td class="px-4 py-2 border flex gap-2">
                            <a href="{{ route('pedidos.show', $pedido) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Ver</a>
                            <a href="{{ route('pedidos.edit', $pedido) }}" class="bg-yellow-400 text-white px-2 py-1 rounded">Editar</a>

                            <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
