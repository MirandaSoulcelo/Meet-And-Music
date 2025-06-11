@props(['user' => null])

<header class="header">
    <div class="header-content">
        <div class="flex-shrink-0">
            {{-- O link do logo leva para a home de visitante se não logado, ou para o dashboard se logado --}}
            <a href="{{ auth()->check() ? route('lessons.index') : '/' }}" class="header-logo">
                <span class="logo-meet">Meet</span><span>&Music</span>
            </a>
        </div>

        <div class="flex items-center space-x-4">

            @auth
                {{-- =============================================== --}}
                {{-- CONTEÚDO EXIBIDO PARA USUÁRIOS AUTENTICADOS --}}
                {{-- =============================================== --}}
                <nav class="nav-links hidden md:flex"> {{-- Esconde os links em telas pequenas, ajuste se necessário --}}
                    <a href="{{ route('lessons.index') }}" class="nav-link">Aprender</a>
                    <a href="{{ route('ranking.index') }}" class="nav-link">Ranking</a>
                    <a href="{{ route('friends.index') }}" class="nav-link">Comunidade</a>
                    <a href="{{ route('meetings.index') }}" class="nav-link">Chamadas</a>
                </nav>

                <div class="relative ml-3">
                    <button type="button" class="nav-profile-icon" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Abrir menu do usuário</span>
                        <i class="fas fa-user-circle text-2xl text-text-light hover:text-primary transition-colors"></i>
                    </button>
                    <div id="profile-menu-dropdown" class="profile-dropdown hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                        <form method="POST" action="{{ route('logout') }}" role="none">
                            @csrf
                            <button type="submit" class="dropdown-item w-full text-left" role="menuitem">
                              Sair
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                {{-- =============================================== --}}
                {{-- CONTEÚDO EXIBIDO PARA VISITANTES (NÃO LOGADOS) --}}
                {{-- =============================================== --}}
                <nav class="flex items-center space-x-2">
                    <a href="{{ route('login.index') }}" class="btn btn-outline">Entrar</a>
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Criar Conta</a>
                </nav>
            @endguest

        </div>
    </div>
</header>

{{-- O SCRIPT DO DROPDOWN SÓ É INCLUÍDO SE O USUÁRIO ESTIVER LOGADO --}}
@auth
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileButton = document.getElementById('user-menu-button');
        const profileDropdown = document.getElementById('profile-menu-dropdown');

        if (profileButton && profileDropdown) {
            profileButton.addEventListener('click', function (event) {
                event.stopPropagation();
                profileDropdown.classList.toggle('hidden');
            });

            window.addEventListener('click', function (event) {
                if (!profileDropdown.classList.contains('hidden') && !profileButton.contains(event.target)) {
                    profileDropdown.classList.add('hidden');
                }
            });
        }
    });
</script>
@endauth
