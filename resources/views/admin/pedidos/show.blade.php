<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Pedido: {{ $pedido->nombre }}</h1>

    <p><strong>Proveedor:</strong> {{ $pedido->proveedor->nombre }}</p>
    <p><strong>Fecha:</strong> {{ $pedido->fecha }}</p>
    <p><strong>Estado:</strong> {{ $pedido->estado }}</p>

    <h2 class="text-xl font-semibold mt-4">Productos</h2>
    @if($pedido->productos->isEmpty())
        <p>No hay productos en este pedido.</p>
    @else
        <ul>
            @foreach($pedido->productos as $prod)
                <li>{{ $prod->nombre }} — {{ $prod->pivot->cantidad }} x ${{ number_format($prod->pivot->precio,2) }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('pedidos.index') }}" class="bg-gray-300 px-3 py-2 rounded mt-4 inline-block">Volver</a>
</div>
</x-app-layout>
