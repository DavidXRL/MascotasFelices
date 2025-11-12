<x-app-layout>
<div class="container mx-auto p-6">
<h1 class="text-2xl font-bold mb-4">Editar Cliente</h1>
<form action="{{ route('clientes.update', $cliente) }}" method="POST" class="space-y-4">@csrf @method('PUT')
<input type="text" name="nombre" value="{{ $cliente->nombre }}" class="border px-3 py-2 w-full">
<input type="email" name="email" value="{{ $cliente->email }}" class="border px-3 py-2 w-full">
<input type="text" name="telefono" value="{{ $cliente->telefono }}" class="border px-3 py-2 w-full">
</x-app-layout>
