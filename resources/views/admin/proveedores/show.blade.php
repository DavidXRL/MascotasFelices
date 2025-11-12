<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $proveedor->nombre }}</h1>

    <div class="mb-6">
        <p><strong>Email:</strong> {{ $proveedor->email }}</p>
        <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
    </div>

    <h2 class="text-xl font-semibold mb-3">Historial de Pedidos</h2>

    @if($proveedor->pedidos->isEmpty())
        <p class="text-gray-600">Aún no tiene pedidos registrados.</p>
    @else
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Fecha</th>
                    <th class="px-4 py-2 border">Estado</th>
                    <th class="px-4 py-2 border">Detalle</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proveedor->pedidos as $pedido)
                    <tr>
                        <td class="px-4 py-2 border">{{ $pedido->fecha }}</td>
                        <td class="px-4 py-2 border">{{ $pedido->estado }}</td>
                        <td class="px-4 py-2 border">
                            <button onclick="document.getElementById('detalle-{{$pedido->id}}').classList.toggle('hidden')"
                                    class="bg-blue-500 text-white px-2 py-1 rounded">
                                Ver
                            </button>
                            <div id="detalle-{{$pedido->id}}" class="hidden mt-2 p-2 border">
                                <ul>
                                    @foreach($pedido->productos as $prod)
                                        <li>{{ $prod->nombre }} — {{ $prod->pivot->cantidad }} x ${{ number_format($prod->pivot->precio,2) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="mt-6">
        <a href="{{ route('proveedores.index') }}" class="bg-gray-300 px-3 py-2 rounded">Volver</a>
    </div>
</div>
</x-app-layout>
