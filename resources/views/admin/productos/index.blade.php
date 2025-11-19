<x-app-layout>
<!-- Font Awesome 6 Free CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-RXf+QSDCUQs3B7eKkMZQ+5qyz+HKnFF+B0e4eWk0F5W4i9oJlgAcFhEy6FfYfXl8eeI57k5QdGn0gTk0ujZhw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- O si prefieres solo los íconos sólidos -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css" /> -->


    <div class="container mx-auto p-6 text-center">
        <h1 class="text-3xl font-bold mb-4">Productos</h1>


    <div class="mt-4 mb-4">
        <a href="{{ route('productos.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Agregar  Producto</a>
        <a href="{{ route('reportes.inventario') }}" class="bg-orange-400 text-white px-3 py-2 rounded mr-2">PDF Inventario</a>
        <a href="{{ route('reportes.rendimiento') }}" class="bg-indigo-500 text-white px-3 py-2 rounded">PDF Rendimiento</a>
    </div>


        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 px-6 py-8">
    @forelse($productos as $producto)
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
            <div class="relative w-full h-64 overflow-hidden">
                <img src="/image/products/{{ $producto->image_product }}"
                     alt="Imagen de {{ $producto->nombre }}"
                     class="w-full h-full object-cover object-center transition-transform duration-300 hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
            </div>
            <div class="flex flex-col flex-1 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-3 truncate" title="{{ $producto->nombre }}">
                    {{ $producto->nombre }}
                </h2>

                <p class="text-gray-600 text-sm mb-4 line-clamp-2" title="{{ $producto->descripcion }}">
                    {{ $producto->descripcion }}
                </p>

                <p class="text-gray-500 text-sm mb-4">
                    <span class="font-semibold">Categoría:</span> {{ $producto->categoria ? $producto->categoria->categoria_nombre : 'Sin categoría' }}
                </p>

                <div class="mb-4 pb-4 border-b border-gray-200">
                    <p class="text-2xl font-bold text-green-600 mb-2">${{ number_format($producto->precio, 2) }}</p>
                    <p class="text-sm font-semibold text-gray-700 bg-gray-100 px-3 py-1 rounded-full inline-block">
                        Stock: {{ $producto->stock }}
                    </p>
                </div>

                <div class="flex gap-2 mt-auto">
                    <a href="{{ route('productos.edit', $producto) }}" class="flex-1 bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 rounded text-center transition">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 rounded transition">
                            <i class="fas fa-trash"></i> Eliminar
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
