
<footer class="bg-gray-200 py-10 shadow-inner">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Logo y descripción -->
        <div class="flex flex-col items-center md:items-start">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16 w-16 mb-3 object-contain">
            Mascotas Felices: productos de calidad para el cuidado, alimentación y diversión de tus mascotas.<br>

            </p>
        </div>
        <!-- Enlaces rápidos -->
        <div>
            <h3 class="text-gray-900 font-bold mb-3">Enlaces rápidos</h3>
            <ul class="space-y-2 text-gray-700 text-sm">
                <li><a href="{{ url('/') }}" class="hover:text-gray-800 transition">Inicio</a></li>
                <li><a href="{{ url('/about_us') }}" class="hover:text-gray-800 transition">Sobre nosotros</a></li>

                <li><a href="{{ url('/#contact-info') }}" class="hover:text-gray-800 transition">Contacto</a></li>
            </ul>
        </div>
        <!-- Información de contacto -->
        <div>

            <h3 class="text-gray-900 font-bold mb-3">Contacto</h3>

            <ul class="space-y-2 text-gray-700 text-sm">
                <li><span class="font-semibold">Teléfono:</span> (784) 140-6409</li>
                <li><span class="font-semibold">Correo:</span> <a href="mailto:mascotasfelices@gmail.com" class="hover:text-gray-800">mascotasfelices@gmail.com</a></li>
            </ul>
        </div>
        <!-- Redes sociales -->
        <div>
            <h3 class="text-gray-900 font-bold mb-3 text-center">Síguenos en Facebook</h3>
            <div class="flex justify-center space-x-4">
                <a href="https://www.facebook.com/justosierratelesec" aria-label="Facebook" class="text-gray-800 hover:text-gray-600">
                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.877v-6.987h-2.54v-2.89h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.632.771-1.632 1.562v1.875h2.773l-.443 2.89h-2.33v6.987C18.343 21.128 22 16.991 22 12"></path></svg>
                </a>
            </div>
        </div>
    </div>


    <div class="border-t mt-8 pt-4 text-center text-emerald-800 text-xs">
    <div class="text-gray-500">
        &copy; {{ date('Y') }} Mascotas Felices. Todos los derechos reservados. &nbsp;
        <a href="{{ url('/politicas-privacidad') }}" class="text-emerald-700 hover:underline">
            Políticas de Privacidad
        </a>
    </div>
</div>

</footer>
