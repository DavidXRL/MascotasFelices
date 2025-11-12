<x-app-layout>
<div class="container mx-auto p-6">
<h1 class="text-3xl font-bold mb-4">Ventas</h1>
<a href="{{ route('ventas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nueva Venta</a>
<table class="min-w-full mt-4 bg-white border">
<thead><tr><th class="px-4 py-2 border">Cliente</th><th class="px-4 py-2 border">Fecha</th><th class="px-4 py-2 border">Total</th><th class="px-4 py-2 border">Método Pago</th><th class="px-4 py-2 border">Acciones</th></tr></thead>
<tbody>@foreach($ventas as $venta)<tr>
<td class="px-4 py-2 border">{{ $venta->cliente->nombre }}</td>
<td class="px-4 py-2 border">{{ $venta->fecha }}</td>
<td class="px-4 py-2 border">${{ $venta->total }}</td>
<td class="px-4 py-2 border">{{ $venta->metodo_pago }}</td>
<td class="px-4 py-2 border">
<a href="{{ route('ventas.edit', $venta) }}" class="bg-yellow-400 px-2 py-1 rounded">Editar</a>
<form action="{{ route('ventas.destroy', $venta) }}" method="POST" class="inline">@csrf @method('DELETE')
<button type="submit" class="bg-red-500 px-2 py-1 text-white rounded">Eliminar</button></form>
</td></tr>@endforeach</tbody>
</table></div>
</x-app-layout>
