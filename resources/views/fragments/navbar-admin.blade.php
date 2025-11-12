

<!-- Botón flotante para regresar al inicio -->
<button id="scrollToTopBtn" class="fixed bottom-6 right-6 z-50 bg-gray-900 text-white rounded-full shadow-lg p-3 hover:bg-gray-700 transition hidden" aria-label="Regresar al inicio">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
    </svg>
</button>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


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
