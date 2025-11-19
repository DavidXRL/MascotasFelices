@vite('resources/css/app.css')

<body class="text-gray-900">

@include('layout.main_template')

<main class="mx-auto bg-white">

    {{-- Carousel --}}
    <section class="mb-16">
        <div class="relative w-full mx-auto shadow-2xl overflow-hidden group">
            <div class="flex transition-transform duration-700 ease-in-out" id="carousel-images" style="transform: translateX(0);">

                @php
                    $titulos = [
                        'Bienvenido a Mascotas Felices 🐾',
                        'Todo para consentir a tu mascota ❤️',
                        'Juguetes, ropa y más 🧸',
                        'Nutrición saludable 🥩',
                        'Camas y accesorios cómodos 🛏️',
                        'Cuida a quien más amas 💕'
                    ];

                    $descripciones = [
                        'Encuentra los mejores productos para tu peludo favorito.',
                        'Desde comida hasta juguetes, tenemos todo lo que necesita.',
                        'Haz feliz a tu mascota con nuestros productos de calidad.',
                        'Ofrecemos alimentos balanceados para una vida más sana.',
                        'Descubre camas, collares y accesorios hechos con amor.',
                        'Porque ellos merecen lo mejor, ¡compra con confianza!'
                    ];
                @endphp

                @for ($i = 1; $i <= 6; $i++)
                <div class="relative w-full flex-shrink-0">
                    <img src="{{ asset('img/mf-' . $i . '.jpg') }}"
                         alt="Imagen {{ $i }}"
                         class="w-full object-cover h-[36rem] md:h-[46rem] transition-opacity duration-500"
                         style="min-width:100%; max-width:100%;">
                    <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-40 text-white text-center px-6">
                        <h2 class="text-3xl md:text-5xl font-bold mb-2 drop-shadow-lg">{{ $titulos[$i - 1] }}</h2>
                        <p class="text-lg md:text-xl font-light">{{ $descripciones[$i - 1] }}</p>
                    </div>
                </div>
                @endfor

            </div>

            {{-- Controles --}}
            <button id="carousel-prev" class="absolute left-6 top-1/2 -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-3 shadow-lg hover:bg-gray-200 transition border-2 border-gray-600">
                <i class="fa-solid fa-angle-left"></i>
            </button>

            <button id="carousel-next" class="absolute right-6 top-1/2 -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-3 shadow-lg hover:bg-gray-200 transition border-2 border-gray-600">
                <i class="fa-solid fa-chevron-right"></i>
            </button>

            {{-- Indicadores --}}
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-3 z-10">
                @for ($i = 0; $i < 6; $i++)
                <button class="w-2 h-2 rounded-full bg-white border-2 border-gray-600 shadow transition-all duration-300 hover:bg-gray-400 focus:bg-gray-600"
                        data-carousel-indicator="{{ $i }}"></button>
                @endfor
            </div>
        </div>
    </section>

    {{-- Productos --}}
    <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3 justify-center mt-6">
        @forelse ($productos as $producto)
            <div class="bg-white rounded-3xl shadow-xl p-0 flex flex-col items-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 w-full max-w-md mx-auto border border-gray-100">
                {{-- Imagen del producto --}}
                <div class="relative w-full h-80 rounded-t-3xl overflow-hidden group">
                    <img src="{{ $producto->image_product ? asset('image/products/' . $producto->image_product) : asset('image/default.png') }}"
                        alt="Imagen de {{ $producto->nombre }}"
                        class="w-full h-full object-cover object-center transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute inset-0 opacity-80 group-hover:opacity-60 transition-opacity"></div>
                </div>

                {{-- Información --}}
                <div class="flex flex-col flex-1 px-6 py-5 w-full">
                    <h2 class="text-xl font-bold mb-2 text-gray text-center truncate" title="{{ $producto->nombre }}">
                        {{ $producto->nombre }}
                    </h2>
                    <p class="text-gray-700 mb-4 line-clamp-3 text-center" title="{{ $producto->descripcion }}">
                        {{ $producto->descripcion }}
                    </p>
                       <p class=" text-gray-700 mb-2 text-center">
                    Categoría: {{ $producto->categoria ? $producto->categoria->categoria_nombre : 'Sin categoría' }}
                </p>
                    <div class="flex flex-col items-center justify-center mt-auto gap-2">
                        <span class="inline-flex items-center gap-1 text-sm text-gray-700 bg-gray-100 px-3 py-1 rounded-full shadow-sm">
                            💰 Precio: <strong>${{ number_format($producto->precio, 2) }}</strong>
                        </span>
                        <span class="inline-flex items-center gap-1 text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full shadow-sm">
                            📦 Stock: {{ $producto->stock }}
                        </span>
                    </div>

                    {{-- Botón agregar al carrito --}}
                    <button class="bg-green-500 text-white px-3 py-1 rounded mt-3 w-full" onclick="agregarAlCarrito({{ $producto->id }}, '{{ $producto->nombre }}', {{ $producto->precio }})">
                        Agregar al carrito
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-400 py-10 text-lg">
                No hay productos registrados.
            </div>
        @endforelse
    </div>

    {{-- Carrito --}}
    <section class="px-4 md:px-8 mb-16 p-20">
        <h2 class="text-3xl font-bold mb-4 text-center">Carrito</h2>
        <table class="w-full border mb-4" id="tabla-carrito">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-2 py-1">Producto</th>
                    <th class="border px-2 py-1">Cantidad</th>
                    <th class="border px-2 py-1">Precio</th>
                    <th class="border px-2 py-1">Subtotal</th>
                    <th class="border px-2 py-1">Acción</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <p class="text-right font-bold mb-4">Total: $<span id="total">0.00</span></p>

        <form id="form-carrito" action="{{ route('ventas.store') }}" method="POST">
            @csrf
            <input type="hidden" name="productos_json" id="productos_json">
            <input type="hidden" name="total" id="total_input">
        </form>
        <div class="flex justify-center mt-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="finalizarCompra()">Finalizar Compra</button>
        </div>
    </section>

    {{-- Contacto --}}
    <section id="contact-info" class=" px-4 md:px-8 p-5">
        <h2 class="text-3xl font-bold mb-10 text-center">Información de Contacto</h2>
        <div class="flex flex-col md:flex-row items-start gap-12 max-w-6xl mx-auto">

            <div class="w-full md:w-1/2 rounded-2xl overflow-hidden h-[420px]">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3738.216474383357!2d-97.31620469999991!3d20.45630020000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85da442eda031985%3A0x3d27af5319cd7e27!2sVicente%20Guerrero%2C%20Lomas%20de%20Plata%2C%2093429%20Papantla%20de%20Olarte%2C%20Ver.!5e0!3m2!1ses-419!2smx!4v1762937010973!5m2!1ses-419!2smx" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="w-full md:w-1/2 bg-gray-100 rounded-2xl p-8 space-y-8">
                <div>
                    <h4 class="text-xl font-semibold flex items-center gap-3 mb-3">
                        <i class="fa-solid fa-location-dot"></i> Dirección
                    </h4>
                    <p class="text-gray-900 leading-relaxed">
                        Vicente Guerrero, Lomas de Plata, <br>
                        93429 Papantla de Olarte, Ver.
                    </p>
                </div>
                <div>
                    <h4 class="text-xl font-semibold  flex items-center gap-3 mb-3">
                        <i class="fa-solid fa-clock"></i> Horario de atención
                    </h4>
                    <ul class="text-gray-900 leading-relaxed space-y-2 list-disc list-inside">
                        <li>Lunes a Viernes: <span class="font-medium">8:00 am - 2:00 pm</span></li>
                        <li>Sábado y Domingo: <span class="font-medium">Cerrado</span></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xl font-semibold flex items-center gap-3 mb-3">
                        <i class="fa-solid fa-phone"></i> Contacto rápido
                    </h4>
                    <ul class="text-gray-900 leading-relaxed space-y-2">
                        <li><span class="font-semibold">Teléfono:</span> (784) 140-6409</li>
                        <li><span class="font-semibold">Correo:</span> mascotasfelices@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</main>

@include('layout.footer_template')

<script>
let carrito = [];

function agregarAlCarrito(id, nombre, precio) {
    const existe = carrito.find(item => item.id === id);
    if(existe) {
        existe.cantidad++;
    } else {
        carrito.push({id, nombre, precio, cantidad:1});
    }
    renderCarrito();
}

function eliminarProducto(id) {
    carrito = carrito.filter(item => item.id !== id);
    renderCarrito();
}

function renderCarrito() {
    const tbody = document.querySelector('#tabla-carrito tbody');
    tbody.innerHTML = '';
    let total = 0;
    carrito.forEach(item => {
        const subtotal = item.precio * item.cantidad;
        total += subtotal;
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td class="border px-2 py-1">${item.nombre}</td>
            <td class="border px-2 py-1"><input type="number" value="${item.cantidad}" min="1" class="w-16" onchange="actualizarCantidad(${item.id}, this.value)"></td>
            <td class="border px-2 py-1">${item.precio.toFixed(2)}</td>
            <td class="border px-2 py-1">${subtotal.toFixed(2)}</td>
            <td class="border px-2 py-1"><button type="button" class="bg-red-500 text-white px-2 rounded" onclick="eliminarProducto(${item.id})">X</button></td>
        `;
        tbody.appendChild(tr);
    });
    document.getElementById('total').innerText = total.toFixed(2);
}

function actualizarCantidad(id, cantidad) {
    const item = carrito.find(i => i.id === id);
    if(item) {
        item.cantidad = parseInt(cantidad);
        renderCarrito();
    }
}

function finalizarCompra() {
    if(carrito.length === 0) {
        alert('El carrito está vacío');
        return;
    }
    document.getElementById('productos_json').value = JSON.stringify(carrito);
    document.getElementById('total_input').value = carrito.reduce((sum, i) => sum + i.precio*i.cantidad, 0);
    document.getElementById('form-carrito').submit();
}
</script>

</body>
