<x-app-layout>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Proveedores</h1>

        <a href="{{ route('proveedores.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Agregar Proveedor
        </a>

        <table class="min-w-full border-collapse border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Teléfono</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($proveedores as $proveedor)
                    <tr>
                        <td class="px-4 py-2 border">{{ $proveedor->nombre }}</td>
                        <td class="px-4 py-2 border">{{ $proveedor->email }}</td>
                        <td class="px-4 py-2 border">{{ $proveedor->telefono }}</td>
                        <td class="px-4 py-2 border flex gap-2">
                            <a href="{{ route('proveedores.show', $proveedor) }}" class="bg-blue-400 px-2 py-1 text-white rounded">Ver</a>
                            <a href="{{ route('proveedores.edit', $proveedor) }}" class="bg-yellow-400 px-2 py-1 rounded">Editar</a>

                            <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" class="inline">
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
