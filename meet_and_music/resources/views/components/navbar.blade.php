@props(['user' => null])

<nav class="w-full h-24 flex items-center justify-between px-6 header">
    <div>
        <a href="/home" class="text-2xl font-bold flex items-center text-white">
            <span class="text-primary">Meet</span>
            <span class="text-secondary">&</span>
            <span class="text-secondary">Music</span>
        </a>
    </div>
    <div class="flex items-center space-x-8">
        <div class="flex items-center space-x-8">
            <a href="{{ route('lessons.index') }}" class="nav-link text-text-light hover:text-white transition-colors">Aprender</a>
            <a href="{{ route('ranking.index') }}" class="nav-link text-text-light hover:text-white transition-colors">Ranking</a>
            <a href="{{ route('friends.index') }}" class="nav-link text-text-light hover:text-white transition-colors">Comunidade</a>
            <a href="{{ route('meetings.index') }}" class="nav-link text-text-light hover:text-white transition-colors">Chamadas</a>
        </div>
        <div class="relative">
            <button id="profile-menu-button" class="nav-profile-icon flex items-center" title="Meu Perfil" type="button">
                <i class="fas fa-user-circle text-2xl text-text-light hover:text-primary transition-colors"></i>
            </button>
            <div id="profile-menu-dropdown" class="profile-dropdown hidden">
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="btn btn-outline btn-sm w-full text-left px-4 py-2 text-sm">Sair</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const profileButton = document.getElementById('profile-menu-button');
            const profileDropdown = document.getElementById('profile-menu-dropdown');

            if (profileButton && profileDropdown) {
                profileButton.addEventListener('click', function(event) {
                    event.stopPropagation();
                    profileDropdown.classList.toggle('hidden');
                });

                window.addEventListener('click', function(event) {
                    if (!profileDropdown.classList.contains('hidden') && !profileButton.contains(event.target)) {
                        profileDropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</nav>
