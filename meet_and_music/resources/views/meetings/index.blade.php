@extends('layouts.app')

@section('content')
<div class="content-card">
    <div class="flex justify-between items-center mb-4">
        <h1 class="card-title" style="margin-bottom: 0; border-bottom: none;">Minhas Vídeo Chamadas</h1>
        <a href="#" class="btn btn-primary">Nova Chamada</a>
    </div>

    @if($meetings->count() > 0)
        <div class="meetings-grid">
            @foreach($meetings as $meeting)
                <div class="meeting-card">
                    <div>
                        <p class="meeting-title">
                            Criada em {{ $meeting->created_at->format('d/m/Y H:i') }}
                        </p>
                        <h5 class="meeting-description">{{ $meeting->title }}</h5>
                    </div>
                    <div class="meeting-actions">
                        <a href="{{ route('meeting.video.call', $meeting->room_id) }}" class="btn btn-primary btn-sm" style="flex-grow: 1;">
                            Entrar
                        </a>
                        <button class="btn btn-secondary btn-sm" onclick="compartilhar('{{ $meeting->room_id }}')" style="flex-grow: 1;">
                            Compartilhar
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <h5 class="empty-state-title">Nenhuma videochamada criada ainda</h5>
            <p class="empty-state-text">Clique em "Nova Chamada" para começar.</p>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
function compartilhar(roomId) {
    const link = "{{ url('/video-call') }}/" + roomId;
    navigator.clipboard.writeText(link).then(() => {
        alert('Link copiado para a área de transferência!');
    });
}
</script>
@endpush
