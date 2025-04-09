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
<body class="bg-background text-text">
    @if(!request()->is('login') && !request()->is('register') && !request()->is('usercreate'))
    <!-- Navbar -->
    <nav class="bg-surface border-b border-border">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-2xl font-bold text-gradient">Meet & Music</a>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('lessons.index') }}" class="text-text-light hover:text-primary inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-primary text-sm font-medium">
                            Aprender
                        </a>
                        <a href="#" class="text-text-light hover:text-primary inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-primary text-sm font-medium">
                            Revisar
                        </a>
                        <a href="#" class="text-text-light hover:text-primary inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-primary text-sm font-medium">
                            Comunidade
                        </a>
                        <a href="#" class="text-text-light hover:text-primary inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-primary text-sm font-medium">
                            Cursos
                        </a>
                    </div>
                </div>
                <!-- Right Side -->
                <div class="flex items-center">
                    @if(auth()->check())
                        <span class="text-text-light mr-4">{{ auth()->user()->name }}</span>
                        <a href="{{ route('login.destroy') }}" class="btn btn-outline">Sair</a>
                    @else
                        <a href="{{ route('login.index') }}" class="btn btn-primary">Entrar</a>
                        <a href="{{ route('user.create') }}" class="ml-4 btn btn-outline">Cadastrar</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    @endif

    <!-- Main Content -->
    <main class="@if(!request()->is('login') && !request()->is('register') && !request()->is('usercreate')) container mx-auto py-6 sm:px-6 lg:px-8 @endif">
        @if (session('success'))
            <div class="bg-green-900/20 border border-green-500/30 text-green-400 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-900/20 border border-red-500/30 text-red-400 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    @if(!request()->is('login') && !request()->is('register') && !request()->is('usercreate'))
    <!-- Footer -->
    <footer class="bg-surface border-t border-border mt-12">
        <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="text-center text-text-light text-sm">
                &copy; 2024 Meet & Music. Todos os direitos reservados.
            </div>
        </div>
    </footer>
    @endif
</body>
</html>

