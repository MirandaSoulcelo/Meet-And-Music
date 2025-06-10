@props(['user' => null])

<nav class="header">
    <div class="header-content">
        <a href="/home" class="text-2xl font-bold">
            <span class="text-primary">Meet</span>
            <span class="text-text">&</span>
            <span class="text-secondary">Music</span>
        </a>
        @auth
            <div class="flex items-center gap-6">
                <nav class="nav-links flex gap-4">
                    <a href="{{ route('lessons.index') }}" class="nav-link">Aprender</a>
                    <a href="{{ route('ranking.index') }}" class="nav-link">Revisar</a>
                    <a href="{{ route('friends.index') }}" class="nav-link">Comunidade</a>
                    <a href="{{ route('meetings.index') }}" class="nav-link">Chamadas</a>
                </nav>
                <div class="relative group">
                    <a href="{{ route('profile.show') }}" class="nav-profile-icon flex items-center" title="Meu Perfil">
                        <i class="fas fa-user-circle text-2xl text-text-light hover:text-primary transition-colors"></i>
                    </a>
                    <div class="absolute right-0 mt-2 hidden group-hover:block bg-surface border border-border rounded-lg shadow-lg z-50 min-w-[120px]">
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="btn btn-outline btn-sm w-full text-left px-4 py-2 text-sm">Sair</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <nav class="nav-links flex gap-4">
                @unless (request()->routeIs('login.index') || request()->routeIs('user.create'))
                    <a href="{{ route('login.index') }}" class="btn btn-outline">Entrar</a>
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Começar Agora</a>
                @endunless
            </nav>
        @endauth
    </div>
</nav>
