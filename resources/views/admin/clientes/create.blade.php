<x-app-layout>
<div class="container mx-auto p-6">
<h1 class="text-2xl font-bold mb-4">Crear Cliente</h1>
<form action="{{ route('clientes.store') }}" method="POST" class="space-y-4">@csrf
<input type="text" name="nombre" placeholder="Nombre" class="border px-3 py-2 w-full">
<input type="email" name="email" placeholder="Email" class="border px-3 py-2 w-full">
<input type="text" name="telefono" placeholder="Teléfono" class="border px-3 py-2 w-full">
<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
</form></div>
</x-app-layout>
