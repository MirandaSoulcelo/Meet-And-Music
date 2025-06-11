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
            </nav>
        @endauth

        <div class="flex-shrink-0">
            @auth
                <div class="profile-container">
                    <a href="{{ route('profile.show') }}" class="profile-link" aria-label="Ver perfil">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="profile-icon">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <div class="profile-dropdown">
                        <form method="POST" action="{{ route('logout') }}" role="none">
                            @csrf
                            <button type="submit" class="dropdown-item w-full text-left">Sair</button>
                        </form>
                    </div>
                </div>
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