@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tienda</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($productos as $producto)
            <div class="border rounded-lg shadow p-4 flex flex-col justify-between">
                <div>
                    <h2 class="text-lg font-semibold">{{ $producto->nombre }}</h2>
                    <p class="text-gray-600 text-sm mb-2">{{ $producto->descripcion }}</p>
                    <p class="font-bold mb-2">${{ number_format($producto->precio, 2) }}</p>
                    <p class="text-sm text-gray-500 mb-4">Stock: {{ $producto->stock }}</p>
                </div>

                <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white w-full py-2 rounded">
                        Agregar al carrito
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
