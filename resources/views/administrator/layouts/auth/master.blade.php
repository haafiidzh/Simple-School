<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">

    <link rel="icon" href="{{ asset('assets/img/logo-kecil.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo-kecil.ico') }}">

    {{-- Tailwind CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/d89a21a1ce.js" crossorigin="anonymous"></script>
    <title>@yield('title') | Kurnia Brownies</title>
    @livewireStyles
    @stack('styles')
</head>

<body class="font-poppins">

    <main class="bg-slate-300 min-h-screen">
        @yield('content')
    </main>
    
    @livewireScripts
    @stack('scripts')
</body>

</html>
