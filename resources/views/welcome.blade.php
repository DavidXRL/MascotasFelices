@vite('resources/css/app.css')

<body class=" text-gray-900">

@include('layout.main_template')



<main class="mx-auto bg-white">

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
        <!-- Imagen -->
        <img src="{{ asset('img/mf-' . $i . '.jpg') }}"
             alt="Imagen {{ $i }}"
             class="w-full object-cover h-[36rem] md:h-[46rem] transition-opacity duration-500"
             style="min-width:100%; max-width:100%;">

        <!-- Texto encima (dinámico) -->
        <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-40 text-white text-center px-6">
          <h2 class="text-3xl md:text-5xl font-bold mb-2 drop-shadow-lg">{{ $titulos[$i - 1] }}</h2>
          <p class="text-lg md:text-xl font-light">{{ $descripciones[$i - 1] }}</p>
        </div>
      </div>
      @endfor

    </div>

    <!-- Controles -->
    <button id="carousel-prev"
      class="absolute left-6 top-1/2 -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-3 shadow-lg hover:bg-gray-200 transition border-2 border-gray-600 opacity-0 group-hover:opacity-100 focus:opacity-100"
      aria-label="Anterior">
      <i class="fa-solid fa-angle-left"></i>
    </button>

    <button id="carousel-next"
      class="absolute right-6 top-1/2 -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-3 shadow-lg hover:bg-gray-200 transition border-2 border-gray-600 opacity-0 group-hover:opacity-100 focus:opacity-100"
      aria-label="Siguiente">
      <i class="fa-solid fa-chevron-right"></i>
    </button>

    <!-- Indicadores -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-3 z-10">
      @for ($i = 0; $i < 6; $i++)
      <button class="w-2 h-2 rounded-full bg-white border-2 border-gray-600 shadow transition-all duration-300 hover:bg-gray-400 focus:bg-gray-600"
        data-carousel-indicator="{{ $i }}"></button>
      @endfor
    </div>
  </div>
</section>







    {{-- Información de contacto --}}
    <section id="contact-info" class=" px-4 md:px-8 p-5">
        <h2 class="text-3xl font-bold mb-10 text-center">Información de Contacto</h2>
        <div class="flex flex-col md:flex-row items-start gap-12 max-w-6xl mx-auto">

            {{-- Mapa --}}
            <div class="w-full md:w-1/2 rounded-2xl overflow-hidden  h-[420px]">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3738.216474383357!2d-97.31620469999991!3d20.45630020000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85da442eda031985%3A0x3d27af5319cd7e27!2sVicente%20Guerrero%2C%20Lomas%20de%20Plata%2C%2093429%20Papantla%20de%20Olarte%2C%20Ver.!5e0!3m2!1ses-419!2smx!4v1762937010973!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                             width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            {{-- Datos contacto --}}
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

</body>
