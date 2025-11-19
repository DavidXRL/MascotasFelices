<x-app-layout>
<div class="container mx-auto p-6 flex flex-col items-center">

    <!-- Nombre del cliente -->
    <div class="bg-gradient-to-r from-green-400 to-blue-500 text-white rounded-3xl p-6 mb-8 shadow-lg w-full max-w-2xl text-center">
        <h1 class="text-3xl font-bold">{{ $cliente->nombre }}</h1>
        <div class="mt-3 space-y-1 text-lg">
            <p><strong>Email:</strong> {{ $cliente->email }}</p>
            <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
            <p><strong>Puntos de fidelidad:</strong> {{ $cliente->puntos_fidelidad }}</p>
        </div>
    </div>

    <!-- Historial de compras -->
    <h2 class="text-2xl font-semibold mb-6 text-gray-700 text-center w-full max-w-2xl">Historial de compras</h2>

    @if($cliente->ventas->isEmpty())
        <p class="text-gray-500 italic text-center mb-6">Aún no tiene compras registradas.</p>
    @else
        <div class="flex flex-wrap justify-center gap-6 w-full">
            @foreach($cliente->ventas as $venta)
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 w-full max-w-sm">
                    <div class="p-5 flex flex-col h-full">
                        <div class="mb-4 text-center">
                            <p class="text-gray-600"><strong>Fecha:</strong> {{ $venta->fecha }}</p>
                            <p class="text-gray-600"><strong>Total:</strong> ${{ number_format($venta->total,2) }}</p>
                            <p class="text-gray-600"><strong>Método de pago:</strong> {{ $venta->metodo_pago }}</p>
                        </div>

                        <!-- Detalle de productos -->
                        <button onclick="document.getElementById('detalle-{{$venta->id}}').classList.toggle('hidden')"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full mb-3 transition w-full">
                            Ver detalle
                        </button>
                        <div id="detalle-{{$venta->id}}" class="hidden border-t border-gray-200 pt-3">
                            <ul class="list-disc list-inside space-y-1 text-gray-700">
                                @foreach($venta->productos as $prod)
                                    <li>{{ $prod->nombre }} — {{ $prod->pivot->cantidad }} x ${{ number_format($prod->pivot->precio,2) }}</li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Volver -->
    <div class="mt-8">
        <a href="{{ route('clientes.index') }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-full transition">
           Volver
        </a>
    </div>
</div>
</x-app-layout>
