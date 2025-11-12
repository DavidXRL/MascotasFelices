<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $cliente->nombre }}</h1>

    <div class="mb-6">
        <p><strong>Email:</strong> {{ $cliente->email }}</p>
        <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
        <p><strong>Puntos de fidelidad:</strong> {{ $cliente->puntos_fidelidad }}</p>
    </div>

    <h2 class="text-xl font-semibold mb-3">Historial de compras</h2>
    @if($cliente->ventas->isEmpty())
        <p class="text-gray-600">Aún no tiene compras registradas.</p>
    @else
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Fecha</th>
                    <th class="px-4 py-2 border">Total</th>
                    <th class="px-4 py-2 border">Método de pago</th>
                    <th class="px-4 py-2 border">Detalle</th>
                    <th class="px-4 py-2 border">PDF</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cliente->ventas as $venta)
                    <tr>
                        <td class="px-4 py-2 border">{{ $venta->fecha }}</td>
                        <td class="px-4 py-2 border">${{ number_format($venta->total,2) }}</td>
                        <td class="px-4 py-2 border">{{ $venta->metodo_pago }}</td>
                        <td class="px-4 py-2 border">
                            <button onclick="document.getElementById('detalle-{{$venta->id}}').classList.toggle('hidden')" class="bg-blue-500 text-white px-2 py-1 rounded">Ver</button>
                            <div id="detalle-{{$venta->id}}" class="hidden mt-2 p-2 border">
                                <ul>
                                    @foreach($venta->productos as $prod)
                                        <li>{{ $prod->nombre }} — {{ $prod->pivot->cantidad }} x ${{ number_format($prod->pivot->precio,2) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('ventas.pdf', $venta) }}" class="bg-green-500 text-white px-2 py-1 rounded">Descargar PDF</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="mt-6">
        <a href="{{ route('clientes.index') }}" class="bg-gray-300 px-3 py-2 rounded">Volver</a>
    </div>
</div>


</x-app-layout>
