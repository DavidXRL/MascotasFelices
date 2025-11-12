<!DOCTYPE html>
<html>
<head>
    <title>Sobre nosotros | Mascotas Felices</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-gray-100 via-white to-gray-100 min-h-screen">

    @include('layout.main_template')

    <main class="mx-auto bg-white">

<div class="flex flex-col items-center mb-16">
  <h1 class="text-4xl md:text-4xl font-extrabold text-center text-gray-900 drop-shadow-lg mb-6 flex items-center gap-4 mt-7">
    SOBRE NOSOTROS
  </h1>
  <div class="h-2 w-48 bg-gray-600 rounded-full shadow-lg"></div>
</div>

<section class="mb-16 max-w-4xl mx-auto px-6">
  <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-14 tracking-wide flex items-center justify-center gap-3 drop-shadow-md">
    <span class="text-4xl"><i class="fa-solid fa-hourglass-start"></i></span> NUESTRA HISTORIA
  </h2>
<div class="relative bg-white rounded-3xl shadow-2xl p-10 border border-gray-200">
    <div class="space-y-7 text-center text-lg text-gray-800 leading-relaxed font-medium max-w-3xl mx-auto">
        <p>
            Mascotas Felices fue fundada en <span class="font-semibold text-gray-900">2019</span> por tres amigos y apasionados dueños de mascotas: <span class="font-semibold text-gray-900">Ángel de Gabriel, José David y Deyanira</span>. Su motivación era sencilla: crear un lugar donde solo se ofrecieran productos de la más alta calidad y un servicio genuinamente experto.
        </p>
        <p>
            Iniciamos con una curaduría especializada en nutrición premium y accesorios innovadores. Hoy, somos un punto de referencia para quienes buscan lo mejor para sus compañeros peludos, bajo la promesa de que "Invertir en su Bienestar es Invertir en tu Felicidad".
        </p>
    </div>
</div>
</section>
<section class="px-6 max-w-5xl mx-auto flex flex-col md:flex-row gap-10 mb-20">
  <div class="flex-1  border border-gray-300 rounded-3xl shadow-lg p-12 text-center transition-transform hover:scale-[1.04] duration-300 cursor-default">
    <h3 class="text-4xl font-extrabold text-gray-900 uppercase tracking-widest mb-5 flex items-center justify-center gap-3 drop-shadow-md">
      <span class="text-5xl"><i class="fa-solid fa-person-circle-exclamation"></i></span> MISIÓN
    </h3>
    <div class="h-1 w-28 bg-gray-600 rounded-full mx-auto mb-8 shadow-md"></div>
    <p class="text-lg text-gray-800 leading-relaxed font-semibold">
      Ofrecer un catálogo rigurosamente seleccionado de productos que garanticen la salud, la seguridad y el enriquecimiento de la vida de las mascotas, respaldado por la mejor asesoría al cliente.
    </p>
  </div>

  <div class="flex-1  border border-gray-300 rounded-3xl shadow-lg p-12 text-center transition-transform hover:scale-[1.04] duration-300 cursor-default">
    <h3 class="text-4xl font-extrabold text-gray-900 uppercase tracking-widest mb-5 flex items-center justify-center gap-3 drop-shadow-md">
      <span class="text-5xl"><i class="fa-solid fa-eye-low-vision"></i></span> VISIÓN
    </h3>
    <div class="h-1 w-28 bg-gray-600 rounded-full mx-auto mb-8 shadow-md"></div>
    <p class="text-lg text-gray-800 leading-relaxed font-semibold">
      Ser la tienda líder en el sector, reconocida por nuestra excelencia en el servicio, la constante innovación en nuestra oferta de productos y por ser el socio de confianza de los dueños de mascotas.
    </p>
  </div>
</section>


      <section class="mb-20 px-6">
  <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-14 tracking-tight flex items-center justify-center gap-3 drop-shadow-md">
    <span class="text-5xl"><i class="fa-solid fa-star"></i></span> NUESTROS PILARES
  </h2>

  <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-3 max-w-7xl mx-auto px-4">
    @php
      $valores = [
          ['nombre' => 'Calidad Garantizada', 'emoji' => '🥇', 'desc' => 'Solo vendemos productos que superan nuestros estándares de seguridad y que contribuyen positivamente a la vida de tu mascota.'],
          ['nombre' => 'Atención Personalizada', 'emoji' => '🤝', 'desc' => 'Nuestro equipo está aquí para escuchar tus necesidades y ofrecerte la solución perfecta, basada en el conocimiento experto.'],
          ['nombre' => 'Compromiso Ético', 'emoji' => '⚖️', 'desc' => 'Priorizamos trabajar con marcas sostenibles y que respetan el bienestar animal en sus procesos de fabricación.'],
      ];
    @endphp

    @foreach ($valores as $valor)
      <div class="bg-white rounded-3xl shadow-lg p-8 flex flex-col items-center text-center border border-gray-200
                  hover:shadow-2xl hover:scale-[1.03] transition-transform duration-300">
        <div class="flex items-center justify-center w-20 h-20 mb-5 bg-gray-100 rounded-full text-5xl">
          {{ $valor['emoji'] }}
        </div>
        <h3 class="text-3xl font-bold text-gray-800 mb-3">{{ $valor['nombre'] }}</h3>
        <p class="text-gray-700 leading-relaxed max-w-[320px]">
          {{ $valor['desc'] }}
        </p>
      </div>
    @endforeach
  </div>
</section>

    </main>

    @include('layout.footer_template')

</body>
</html>
