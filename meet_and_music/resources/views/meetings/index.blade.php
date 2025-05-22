@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Minhas Videochamadas</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#criarMeetingModal">
                    Nova Chamada
                </button>
            </div>
            
            @if($meetings->count() > 0)
                <div class="row">
                    @foreach($meetings as $meeting)
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $meeting->title }}</h5>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            Criada em {{ $meeting->created_at->format('d/m/Y H:i') }}
                                        </small>
                                    </p>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('video.call', $meeting->room_id) }}" 
                                           class="btn btn-success btn-sm">
                                            Entrar
                                        </a>
                                        <button class="btn btn-outline-primary btn-sm" 
                                                onclick="compartilhar('{{ $meeting->room_id }}')">
                                            Compartilhar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <h5>Nenhuma videochamada criada ainda</h5>
                    <p class="text-muted">Clique em "Nova Chamada" para começar</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Criar Meeting -->
<div class="modal fade" id="criarMeetingModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('meeting.criar') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Nova Videochamada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Título da Chamada</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               placeholder="Ex: Reunião de Projeto" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar e Entrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function compartilhar(roomId) {
    const link = "{{ url('/video-call') }}/" + roomId;
    navigator.clipboard.writeText(link).then(() => {
        alert('Link copiado! Compartilhe com os participantes.');
    });
}
</script>
@endsection