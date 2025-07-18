@extends('layouts.app')

@section('content')
<div class="content-card">
    <h1 class="card-title">Lista de Amigos</h1>

    @if(empty($friendsWithMeetingStatus) || count($friendsWithMeetingStatus) == 0)
        <div class="text-center py-8">
            <h5 class="text-lg font-semibold">Você ainda não tem amigos adicionados.</h5>
            <p class="text-text-light mt-2">Use a busca na comunidade para encontrar novos amigos.</p>
        </div>
    @else
        <div class="module-list mt-8">
            @foreach($friendsWithMeetingStatus as $friendData)
                {{-- Cada amigo agora é um "module-item" para herdar o estilo --}}
                <div class="module-item">
                    <div class="module-item-content">
                        <h3 class="module-item-title">{{ $friendData['user']->name }}</h3>

                        @if($friendData['is_in_meeting'])
                            <p class="module-item-description" style="color: var(--success-color);">
                                <i class="fas fa-video"></i> Em sala: {{ $friendData['meeting_title'] ?? '' }}
                            </p>
                        @else
                            <p class="module-item-description">
                                <i class="fas fa-circle" style="font-size: 0.7em;"></i> Offline
                            </p>
                        @endif
                    </div>

                    {{-- Container dos botões agora usa CSS Grid para garantir colunas de tamanho igual --}}
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.5rem; width: 300px;">
                        @if($friendData['is_in_meeting'])
                            <a href="{{ $friendData['meeting_link'] ?? '#' }}" class="btn btn-primary btn-sm w-full">
                                Conectar-se
                            </a>
                        @else
                            <div></div>
                        @endif

                        <form action="{{ route('friends.remove', $friendData['user']->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover {{ $friendData['user']->name }} da sua lista de amigos?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline btn-sm w-full">
                                Remover
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

{{-- O Modal de confirmação pode ser mantido ou estilizado posteriormente --}}
@endsection
