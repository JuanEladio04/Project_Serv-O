<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/d9c51a1842.js" crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased bg-cBackground">
    @include('layouts.navigation')
    <div class="min-h-screen ">
        <!-- Page Content -->
        <main>
            {{ $slot }}
            <livewire:StatusAlert />
        </main>

    </div>
    @include('layouts.footer')

</body>

</html>
