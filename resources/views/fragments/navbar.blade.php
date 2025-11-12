

<header class="w-full bg-gray-200 shadow-md py-4 px-4 md:px-8 flex items-center justify-between flex-wrap" style="position: sticky; top: 0; z-index: 100;">
    <div class="flex items-center space-x-3">
        <!-- Espacio para imagen -->
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-12 w-12 md:h-10 md:w-10 object-contain" />
        </a>  <span class="text-base sm:text-lg md:text-xl font-bold text-gray-800">Mascotas Felices</span>
    </div>
    <button id="menu-toggle" class="md:hidden text-indigo-950 focus:outline-none ml-2" aria-label="Abrir menú">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
    <nav id="nav-menu" class="w-full md:w-auto space-y-2 md:space-y-0 md:space-x-6 mt-4 md:mt-0 hidden md:block">
        <a href="{{ url('/') }}" class="block md:inline text-gray-900 text-sm md:text-base transition hover:text-gray-500 font-semibold">Inicio</a>
        <a href="{{ url('/about_us') }}" class="block md:inline text-gray-900 text-sm md:text-base transition hover:text-gray-500 font-semibold">Sobre nosotros</a>
        <a href="{{ url('/#contact-info') }}" class="block md:inline text-gray-900 text-sm md:text-base transition hover:text-gray-500 font-semibold">Contacto</a>
        <a href="{{ url('/login') }}" class="block md:inline text-gray-900 text-sm md:text-base transition hover:text-gray-500 font-semibold">Iniciar Sesión</a>
    </nav>
</header>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


<!-- Botón flotante para regresar al inicio -->
<button id="scrollToTopBtn" class="fixed bottom-6 right-6 z-50 bg-gray-900 text-white rounded-full shadow-lg p-3 hover:bg-gray-700 transition hidden" aria-label="Regresar al inicio">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
    </svg>
</button>


<script>
    const menuToggle = document.getElementById('menu-toggle');
    const navMenu = document.getElementById('nav-menu');
    menuToggle.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
    });

                document.addEventListener('DOMContentLoaded', function () {
                const images = document.getElementById('carousel-images');
                const total = 6;
                let current = 0;
                const indicators = document.querySelectorAll('[data-carousel-indicator]');
                function updateCarousel() {
                    images.style.transform = `translateX(-${current * 100}%)`;
                    indicators.forEach((btn, idx) => {
                        btn.classList.toggle('bg-gray-800', idx === current);
                        btn.classList.toggle('bg-gray-300', idx !== current);
                    });
                }
                document.getElementById('carousel-prev').onclick = function () {
                    current = (current - 1 + total) % total;
                    updateCarousel();
                };
                document.getElementById('carousel-next').onclick = function () {
                    current = (current + 1) % total;
                    updateCarousel();
                };
                indicators.forEach((btn, idx) => {
                    btn.onclick = function () {
                        current = idx;
                        updateCarousel();
                    };
                });
                // Auto-slide
                setInterval(() => {
                    current = (current + 1) % total;
                    updateCarousel();
                }, 5000);
                updateCarousel();
            });

                // Mostrar/ocultar botón al hacer scroll
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 200) {
            scrollToTopBtn.classList.remove('hidden');
        } else {
            scrollToTopBtn.classList.add('hidden');
        }
    });
    // Scroll suave al inicio
    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>

