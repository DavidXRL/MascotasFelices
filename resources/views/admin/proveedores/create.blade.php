<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Nuevo Proveedor</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('proveedores.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" class="border px-3 py-2 w-full" required>
        <input type="email" name="email" placeholder="Email" class="border px-3 py-2 w-full" required>
        <input type="text" name="telefono" placeholder="Teléfono" class="border px-3 py-2 w-full" required>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>
</x-app-layout>
