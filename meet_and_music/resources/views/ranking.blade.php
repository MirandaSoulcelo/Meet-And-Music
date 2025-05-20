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
                                    @foreach($ranking as $index => $userXp)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $userXp->user->name ?? 'Usuário não encontrado' }}</td>
                                            <td>{{ $userXp->nivel_atual }}</td>
                                            <td>{{ $userXp->xp_atual }} / 100</td>
                                            <td>
                                                @auth
                                                    @if(Auth::id() === $userXp->user_id)
                                                        <span class="badge bg-secondary">Você</span>
                                                    @else
                                                        @php
                                                            $currentUser = Auth::user();
                                                            $otherUser = $userXp->user;
                                                        @endphp
                                                        
                                                        @if($currentUser->isFriendWith($otherUser))
                                                            <span class="badge bg-success">Amigos</span>
                                                        @elseif($currentUser->hasPendingFriendRequestTo($otherUser))
                                                            <span class="badge bg-warning">Solicitação Enviada</span>
                                                        @elseif($currentUser->hasPendingFriendRequestFrom($otherUser))
                                                            <form action="{{ route('friends.accept', $userXp->user_id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-success">Aceitar</button>
                                                            </form>
                                                            <form action="{{ route('friends.reject', $userXp->user_id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-danger">Recusar</button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('friends.send', $userXp->user_id) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-primary">Adicionar</button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                @else
                                                    <span class="text-muted">Faça login para adicionar</span>
                                                @endauth
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection