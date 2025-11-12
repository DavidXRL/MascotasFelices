<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Proveedor</h1>

    <form action="{{ route('proveedores.update', $proveedor) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="nombre" value="{{ $proveedor->nombre }}" class="border px-3 py-2 w-full" placeholder="Nombre">
        <input type="text" name="contacto" value="{{ $proveedor->contacto }}" class="border px-3 py-2 w-full" placeholder="Contacto">
        <input type="text" name="telefono" value="{{ $proveedor->telefono }}" class="border px-3 py-2 w-full" placeholder="Teléfono">

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
    </form>
</div>
</x-app-layout>
