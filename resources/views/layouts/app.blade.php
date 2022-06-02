<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    @stack('css')


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">

    <div class="bg-gray-100 pb-6">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class=" bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 bg-white rounded-lg my-12">
            {{ $slot }}
        </main>

        <div class="container mx-auto text-center">Made with
            <g-emoji class="g-emoji w-33 h-32 animate-pulse" alias="heartbeat"
                fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f493.png">
                💓
            </g-emoji>
            by HJPelaez
        </div>







        @livewireScripts
        @stack('js')
</body>

</html>