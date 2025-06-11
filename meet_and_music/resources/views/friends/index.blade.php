@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Amigos</div>

                <div class="card-body">
                    @if(empty($friendsWithMeetingStatus) || count($friendsWithMeetingStatus) == 0)
                        <div class="alert alert-info">
                            Você ainda não tem amigos adicionados.
                        </div>
                    @else
                        <ul class="list-group">
                            @foreach($friendsWithMeetingStatus as $friendData)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">{{ $friendData['user']->name }}</h6>

                                            @if($friendData['is_in_meeting'])
                                                <div class="mt-1">
                                                    <span class="badge bg-success me-2">
                                                        <i class="fas fa-video"></i> Em sala
                                                    </span>
                                                    <small class="text-muted">
                                                        Código: <strong>{{ $friendData['meeting_code'] }}</strong>
                                                    </small>
                                                </div>
                                                <div class="mt-1">
                                                    <small class="text-muted">{{ $friendData['meeting_title'] }}</small>
                                                </div>
                                            @else
                                                <span class="badge bg-secondary">
                                                    <i class="fas fa-circle"></i> Offline
                                                </span>
                                            @endif
                                        </div>

                                        <div class="ms-3">
                                            @if($friendData['is_in_meeting'])
                                                <a href="{{ $friendData['meeting_link'] }}"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fas fa-phone"></i> Conectar-se
                                                </a>
                                            @endif

                                            <!-- Botão para remover amigo (se você quiser manter) -->
                                            <button class="btn btn-outline-danger btn-sm ms-2"
                                                    onclick="confirmarRemocao('{{ $friendData['user']->name }}', {{ $friendData['user']->id }})">
                                                <i class="fas fa-user-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para confirmar remoção -->
<div class="modal fade" id="removeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

</div>

<script>
function confirmarRemocao(friendName, friendId) {
    document.getElementById('friendName').textContent = friendName;
    document.getElementById('removeForm').action = `/friends/${friendId}`;
    new bootstrap.Modal(document.getElementById('removeModal')).show();
}
</script>

<style>
.badge {
    font-size: 0.75rem;
}

.list-group-item {
    transition: background-color 0.2s;
}

.list-group-item:hover {
    background-color: #f8f9fa;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}
</style>
@endsection
