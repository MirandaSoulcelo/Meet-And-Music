<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet & Music - Aprenda Música de Forma Social</title>
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-background text-text min-h-screen flex flex-col">
    @if(!request()->is('login') && !request()->is('register') && !request()->is('usercreate'))
        <x-navbar :user="auth()->user()" />
    @endif

    <!-- Main Content -->
    <main class="flex-1 @if(!request()->is('login') && !request()->is('register') && !request()->is('usercreate')) container mx-auto py-6 sm:px-6 lg:px-8 @endif">
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif

        @if(session('error'))
            <x-alert type="error" :message="session('error')" />
        @endif

        @yield('content')
    </main>

    @if(!request()->is('login') && !request()->is('register') && !request()->is('usercreate'))
        <!-- Footer -->
        <footer class="footer fixed bottom-0 left-0 right-0 w-full z-40">
            <div class="footer-content">
                <div class="footer-text">
                    &copy; 2024 Meet & Music. Todos os direitos reservados.
                </div>
            </div>
        </footer>
    @endif
</body>
</html>

