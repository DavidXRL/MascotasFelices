<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Productos</h1>

        <a href="{{ route('productos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Producto</a>

        <div class="mt-4 mb-4">
            <a href="{{ route('reportes.inventario') }}" class="bg-green-500 text-white px-3 py-2 rounded mr-2">PDF Inventario</a>
            <a href="{{ route('reportes.rendimiento') }}" class="bg-purple-500 text-white px-3 py-2 rounded">PDF Rendimiento</a>
        </div>

        <table class="min-w-full mt-4 bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Precio</th>
                    <th class="px-4 py-2 border">Stock</th>
                    <th class="px-4 py-2 border">Categoría</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td class="px-4 py-2 border">{{ $producto->nombre }}</td>
                    <td class="px-4 py-2 border">${{ number_format($producto->precio,2) }}</td>
                    <td class="px-4 py-2 border">{{ $producto->stock }}</td>
                    <td class="px-4 py-2 border">{{ $producto->categoria }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('productos.edit', $producto) }}" class="bg-yellow-400 px-2 py-1 rounded">Editar</a>
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 px-2 py-1 text-white rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
