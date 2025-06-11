@props(['user' => null])

<header class="header">
    <div class="header-content">
        {{-- Logo --}}
        <div>
            <a href="/home" class="text-2xl font-bold flex items-center text-white">
                <span style="color: var(--primary-color);">Meet</span>
                <span style="color: var(--secondary-color);">&</span>
                <span style="color: var(--secondary-color);">Music</span>
            </a>
        </div>

        {{-- Navigation Links --}}
        <div class="nav-links">
            <a href="{{ route('lessons.index') }}" class="nav-link">Aprender</a>
            <a href="{{ route('ranking.index') }}" class="nav-link">Ranking</a>
            <a href="{{ route('friends.index') }}" class="nav-link">Comunidade</a>
            <a href="{{ route('meetings.index') }}" class="nav-link">Chamadas</a>
        </div>

        {{-- Profile Dropdown --}}
        <div class="relative">
            <button id="profile-menu-button" class="nav-profile-icon" type="button" title="Meu Perfil">
                <i class="fas fa-user-circle text-2xl" style="color: var(--text-light);"></i>
            </button>
            <div id="profile-menu-dropdown" class="profile-dropdown hidden">
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-700">Sair</button>
                </form>
            </div>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const profileButton = document.getElementById('profile-menu-button');
    const profileDropdown = document.getElementById('profile-menu-dropdown');
    const profileIcon = profileButton.querySelector('i');

    if (profileButton && profileDropdown) {
        profileButton.addEventListener('click', function(event) {
            event.stopPropagation();
            profileDropdown.classList.toggle('hidden');
        });

        profileButton.addEventListener('mouseover', () => {
             profileIcon.style.color = 'var(--primary-color)';
        });
        profileButton.addEventListener('mouseout', () => {
             profileIcon.style.color = 'var(--text-light)';
        });

        window.addEventListener('click', function(event) {
            if (!profileDropdown.classList.contains('hidden') && !profileButton.contains(event.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    }
});
</script>
