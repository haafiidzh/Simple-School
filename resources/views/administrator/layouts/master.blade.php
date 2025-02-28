<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ url(cache('favicon') ?: "assets/images/default/brand_logo_square.png") }}">
    <link rel="icon" type="image/ico" sizes="32x32" href="{{ url(cache('favicon') ?: "assets/images/default/brand_logo_square.png") }}">
    <link rel="icon" type="image/ico" sizes="16x16" href="{{ url(cache('favicon') ?: "assets/images/default/brand_logo_square.png") }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    {{-- Tailwind CSS --}}
    @vite([
            'resources/css/app.css',
            'resources/js/app.js'
        ])

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/d89a21a1ce.js" crossorigin="anonymous"></script>
    
    <title>@yield('title') | {{ env('app_name') ?: 'Wonderful Website' }}</title>

    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>

    @stack('styles')
    @livewireStyles
</head>

<body class="font-poppins">
    <div x-data="{ isOpen: true }">

        {{-- Sidebar --}}
        <livewire:administrator.layouts.sidebar>

        <div class="flex flex-col flex-grow">
            {{-- Header --}}
            <livewire:administrator.layouts.header>

                {{-- Main Content --}}
                <main x-cloak :class="isOpen ? 'ml-52' : 'ml-20'"
                    class="px-20 pt-5 transition-all duration-300 bg-slate-200 flex-grow min-h-screen">
                    @yield('content')
                </main>
        </div>
        
        {{-- Footer --}}
        {{-- <livewire:administrator.layouts.footer> --}}
    </div>

    
    @livewireScripts
    @stack('scripts')
</body>

</html>
