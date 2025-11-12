<x-app-layout>
<!-- Font Awesome 6 Free CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-RXf+QSDCUQs3B7eKkMZQ+5qyz+HKnFF+B0e4eWk0F5W4i9oJlgAcFhEy6FfYfXl8eeI57k5QdGn0gTk0ujZhw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- O si prefieres solo los íconos sólidos -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css" /> -->


    <div class="container mx-auto p-6 text-center">
        <h1 class="text-3xl font-bold mb-4">Productos</h1>

        <a href="{{ route('productos.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Agregar  Producto</a>



        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 px-6 py-8">
    @forelse($productos as $producto)
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
            <div class="relative w-full h-64 overflow-hidden">
                <img src="/image/products/{{ $producto->image_product }}"
                     alt="Imagen de {{ $producto->nombre }}"
                     class="w-full h-full object-cover object-center transition-transform duration-300 hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
            </div>
            <div class="flex flex-col flex-1 p-5">
                <h2 class="text-xl font-bold text-gray mb-2 truncate" title="{{ $producto->nombre }}">
                    {{ $producto->nombre }}
                </h2>
                <p class="text-gray-700 mb-4 line-clamp-3" title="{{ $producto->descripcion }}">
                    {{ $producto->descripcion }}
                </p>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold text-gray-800">${{ number_format($producto->precio, 2) }}</span>
                    <span class="text-sm text-gray-500 bg-[#E6F4EC] px-3 py-1 rounded-full">
                        Stock: {{ $producto->stock }}
                    </span>
                </div>
                <div class="flex gap-2 mt-auto">
                    <a href="{{ route('productos.edit', $producto) }}" class="flex-1 bg-yellow-400 text-white py-2 rounded text-center hover:bg-yellow-500 transition">
                        Editar
                    </a>
                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 transition">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center text-gray-400 py-10 text-lg">
            No hay productos disponibles.
        </div>
    @endforelse
</div>

    </div>
</x-app-layout>
