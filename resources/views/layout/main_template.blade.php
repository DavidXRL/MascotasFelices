<!DOCTYPE html>
<html lang="es">
@include('fragments.navbar')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <!-- ✅ Font Awesome 6.6.0 (CDN oficial con integridad SHA) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<script src="https://cdn.tailwindcss.com"></script>

    @if (session('status'))
        {{session('status')}}
    @endif

    @yield('content')
</body>
</html>

