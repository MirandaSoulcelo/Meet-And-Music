@props(['user'])

<x-card class="profile-header">
    <div class="flex items-center">
        <div class="profile-avatar">
            <i class="fas fa-user-circle text-4xl"></i>
        </div>
        <div class="profile-info">
            <h1 class="profile-name">{{ $user->name }}</h1>
            <div class="profile-meta-container">
                <p class="profile-meta">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Membro desde {{ $user->created_at->format('M Y') }}
                </p>
                <div class="mt-2 flex items-center space-x-4">
                    <x-badge type="primary">
                        <i class="fas fa-star mr-1"></i>
                        Nível Iniciante
                    </x-badge>
                    <span class="profile-meta">
                        <i class="fas fa-guitar mr-2"></i>
                        Instrumento: Guitarra
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-card>
