@props(['user' => null])

<nav class="bg-surface/80 backdrop-blur-md border-b border-border fixed top-0 left-0 right-0 w-full z-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold">
                        <span class="text-primary">Meet</span>
                        <span class="text-text">&</span>
                        <span class="text-secondary">Music</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('lessons.index') }}" class="nav-link">
                        Aprender
                    </a>
                    <a href="#" class="nav-link">
                        Revisar
                    </a>
                    <a href="#" class="nav-link">
                        Comunidade
                    </a>
                    <a href="#" class="nav-link">
                        Cursos
                    </a>
                </div>
            </div>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">
                @auth
                    <a href="/profile" class="nav-profile-icon" title="Meu Perfil">
                        <i class="fas fa-user-circle text-2xl text-text-light hover:text-primary transition-colors"></i>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-outline btn-sm px-3 py-1 text-sm">
                            Sair
                        </button>
                    </form>
                @else
                    <a href="{{ route('login.index') }}" class="btn btn-primary btn-sm">Entrar</a>
                    <a href="{{ route('user.create') }}" class="btn btn-outline btn-sm">Cadastrar</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
