@extends('layouts.app')

@section('content')
@php
    use Illuminate\Support\Facades\Auth;
@endphp
<div class="ranking-container">
    <div class="ranking-card">
        <div class="ranking-header">Ranking de Usuários</div>

        <div class="ranking-body">
            <table class="ranking-table">
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
                                        <span class="ranking-badge secondary">Você</span>
                                    @else
                                        @php
                                            $currentUser = Auth::user();
                                            $otherUser = $userXp->user;
                                        @endphp

                                        @if($currentUser->isFriendWith($otherUser))
                                            <span class="ranking-badge success">Amigos</span>
                                        @elseif($currentUser->hasPendingFriendRequestTo($otherUser))
                                            <span class="ranking-badge warning">Solicitação Enviada</span>
                                        @elseif($currentUser->hasPendingFriendRequestFrom($otherUser))
                                            <form action="{{ route('friends.accept', $userXp->user_id) }}" method="POST" class="ranking-form">
                                                @csrf
                                                <button type="submit" class="ranking-button success">Aceitar</button>
                                            </form>
                                            <form action="{{ route('friends.reject', $userXp->user_id) }}" method="POST" class="ranking-form">
                                                @csrf
                                                <button type="submit" class="ranking-button danger">Recusar</button>
                                            </form>
                                        @else
                                            <form action="{{ route('friends.send', $userXp->user_id) }}" method="POST" class="ranking-form">
                                                @csrf
                                                <button type="submit" class="ranking-button primary">Adicionar</button>
                                            </form>
                                        @endif
                                    @endif
                                @else
                                    <span class="ranking-login-text">Faça login para adicionar</span>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
