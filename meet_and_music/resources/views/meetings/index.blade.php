@extends('layouts.app')

@section('content')
{{-- Card principal que envolve toda a seção, usando o mesmo estilo da página de lições --}}
<div class="content-card">
    {{-- Cabeçalho do Card: Título e Botão "Nova Chamada" --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="card-title" style="margin-bottom: 0; border-bottom: none;">Minhas Videochamadas</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#criarMeetingModal">
            Nova Chamada
        </button>
    </div>

    {{-- Lista de itens, usando a mesma classe da lista de módulos --}}
    @if($meetings->count() > 0)
        <div class="module-list">
            @foreach($meetings as $meeting)
                {{-- Cada chamada agora é um "module-item" para herdar o estilo --}}
                <div class="module-item">
                    <div class="module-item-content">
                        <h3 class="module-item-title">{{ $meeting->title }}</h3>
                        <p class="module-item-description">
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
