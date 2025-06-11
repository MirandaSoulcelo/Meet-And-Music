<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Diretiva obrigatória para carregar os assets compilados pelo Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Se você usa fontes externas (Google Fonts, Font Awesome), os links podem ser mantidos aqui --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/SEU-CODIGO-AQUI.js" crossorigin="anonymous"></script>

</head>
<body class="antialiased bg-background-color text-text-color font-sans">

    {{-- Renderiza a barra de navegação --}}
    <x-navbar />

    {{-- Renderiza o conteúdo principal da página --}}
    <main>
        {{-- O conteúdo principal da página será injetado aqui --}}
        @yield('content')
    </main>

    {{-- Renderiza o rodapé, se existir um componente para ele --}}
    {{-- <x-footer /> --}}

</body>
</html>
