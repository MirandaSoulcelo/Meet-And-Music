@extends('layouts.app')

@section('content')
{{-- Card principal que envolve toda a seção, usando o mesmo estilo da página de lições --}}
<div class="content-card">
    {{-- Cabeçalho do Card: Título e Botão "Nova Chamada" --}}
    <div class="flex justify-between items-center">
        <h1 class="card-title">Chamadas</h1>
        <button class="btn btn-primary" onclick="document.getElementById('modal-nova-chamada').showModal()">
            Nova Chamada
        </button>
    </div>

    {{-- Lista de itens, usando a mesma classe da lista de módulos --}}
    @if($meetings->count() > 0)
        <div class="item-list-container mt-6">
            @foreach($meetings as $meeting)
                {{-- Cada chamada agora é um "item-card" para herdar o estilo --}}
                <div class="item-card">
                    <div class="item-card-content">
                        <h3 class="item-card-title">{{ $meeting->title }}</h3>
                        <p class="item-card-description">
                            Criada em {{ $meeting->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('meeting.video.call', $meeting->room_id) }}" class="btn btn-primary btn-sm">
                            Entrar
                        </a>
                        <button class="btn btn-secondary btn-sm" onclick="compartilhar('{{ $meeting->room_id }}')">
                            Compartilhar
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        {{-- Mensagem para quando não há chamadas --}}
        <div class="text-center py-8">
            <h5 class="text-lg font-semibold">Nenhuma videochamada criada ainda</h5>
            <p class="text-text-light mt-2">Clique em "Nova Chamada" para começar.</p>
        </div>
    @endif
</div>

{{-- Modal de Nova Chamada --}}
<dialog id="modal-nova-chamada" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg mb-4">Criar Nova Chamada</h3>
        <form action="{{ route('meeting.criar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título da Chamada</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn btn-primary">Criar</button>
                <button type="button" class="btn" onclick="document.getElementById('modal-nova-chamada').close()">Cancelar</button>
            </div>
        </form>
    </div>
</dialog>

<script>
function compartilhar(roomId) {
    const url = `${window.location.origin}/meeting/${roomId}`;
    navigator.clipboard.writeText(url).then(() => {
        alert('Link copiado para a área de transferência!');
    });
}
</script>
@endsection
