@extends('layouts.app')

@section('content')
{{-- Card principal que envolve toda a seção --}}
<div class="content-card">
    {{-- Cabeçalho do Card: Título e Botão "Nova Chamada" --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h1 class="card-title" style="margin-bottom: 0; border-bottom: none;">Minhas Videochamadas</h1>
        {{-- O botão para abrir o modal pode ser estilizado com as classes do projeto --}}
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#criarMeetingModal">
            Nova Chamada
        </button>
    </div>

    {{-- Grid para os cards das chamadas --}}
    @if($meetings->count() > 0)
        <div class="meetings-grid">
            @foreach($meetings as $meeting)
                {{-- Card individual para cada chamada --}}
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
        {{-- Mensagem para quando não há chamadas --}}
        <div class="empty-state">
            <h5 class="empty-state-title">Nenhuma videochamada criada ainda</h5>
            <p class="empty-state-text">Clique em "Nova Chamada" para começar.</p>
        </div>
    @endif
</div>

{{-- O Modal para Criar Meeting pode ser mantido, mas idealmente seria estilizado também --}}
<div class="modal fade" id="criarMeetingModal" tabindex="-1">
    {{-- ... conteúdo do modal ... --}}
</div>
@endsection

@push('scripts')
<script>
function compartilhar(roomId) {
    const link = "{{ url('/video-call') }}/" + roomId;
    navigator.clipboard.writeText(link).then(() => {
        alert('Link copiado! Compartilhe com os participantes.');
    });
}
</script>
@endpush
