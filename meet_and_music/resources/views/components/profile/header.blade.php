@props(['user'])

<div class="profile-header">
    <div class="flex items-center">
        <div class="profile-avatar">
            <i class="fas fa-user"></i>
        </div>
        <div class="profile-info">
            <h1 class="profile-name">{{ $user->name }}</h1>
            <p class="profile-meta">Membro desde {{ $user->created_at->format('M Y') }}</p>
            <div class="mt-2 flex items-center">
                <x-badge type="primary" class="mr-2">Nível Iniciante</x-badge>
                <span class="profile-meta">Instrumento: Guitarra</span>
            </div>
        </div>
    </div>
</div>
