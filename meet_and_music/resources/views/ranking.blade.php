@extends('master')

@section('content')
@php
    use Illuminate\Support\Facades\Auth;
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ranking de Usuários</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Usuário</th>
                                    <th>Nível</th>
                                    <th>XP</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ranking as $index => $userXp)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $userXp->user->name ?? 'Usuário não encontrado' }}</td>
                                        <td>{{ $userXp->nivel_atual }}</td>
                                        <td>{{ $userXp->xp_atual }} / 100</td>
                                        <td>
                                            @if(Auth::check() && Auth::id() !== $userXp->user_id)
                                                @php
                                                    $user = Auth::user();
                                                    $isFriend = $user->sentFriendRequests()->where('friend_id', $userXp->user_id)->where('accepted', true)->exists() || 
                                                                $user->receivedFriendRequests()->where('user_id', $userXp->user_id)->where('accepted', true)->exists();
                                                    $requestSent = $user->sentFriendRequests()->where('friend_id', $userXp->user_id)->where('accepted', false)->exists();
                                                    $requestReceived = $user->receivedFriendRequests()->where('user_id', $userXp->user_id)->where('accepted', false)->exists();
                                                @endphp

                                                @if($isFriend)
                                                    <span class="badge bg-success">Amigos</span>
                                                @elseif($requestSent)
                                                    <span class="badge bg-warning">Solicitação Enviada</span>
                                                @elseif($requestReceived)
                                                    <form action="{{ route('friends.accept', $userXp->user_id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success">Aceitar Solicitação</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('friends.send', $userXp->user_id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-primary">Adicionar como Amigo</button>
                                                    </form>
                                                @endif
                                            @elseif(Auth::id() === $userXp->user_id)
                                                <span class="badge bg-secondary">Você</span>
                                            @else
                                                <span class="text-muted">Faça login para adicionar</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Nenhum usuário encontrado no ranking</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection