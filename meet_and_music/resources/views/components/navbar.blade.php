@props(['user' => null])

<header class="header">
    <div class="header-content">

        <div class="flex-shrink-0">
            <a href="{{ auth()->check() ? route('lessons.index') : '/' }}" class="header-logo">
                <span class="logo-meet">Meet</span><span>&Music</span>
            </a>
        </div>

        @auth
            <nav class="nav-links">
                <a href="{{ route('lessons.index') }}" class="nav-link">Aprender</a>
                <a href="{{ route('ranking.index') }}" class="nav-link">Ranking</a>
                <a href="{{ route('friends.index') }}" class="nav-link">Comunidade</a>
                <a href="{{ route('meetings.index') }}" class="nav-link">Chamadas</a>
                <a href="{{ route('profile.show') }}" class="nav-link">Perfil</a>
                <a href="{{ route('logout') }}" class="nav-link">Sair</a>
            </nav>
        @endauth

            @guest
                <nav class="flex items-center space-x-2">
                    <a href="{{ route('login.index') }}" class="btn btn-outline">Entrar</a>
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Criar Conta</a>
                </nav>
            @endguest
        </div>

    </div>
</header>

@auth
    <script>
        // Script do dropdown aqui...
    </script>
@endauth