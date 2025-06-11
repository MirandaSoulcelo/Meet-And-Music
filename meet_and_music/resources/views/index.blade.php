@extends('layouts.app')

@section('content')
    <h1>Lista de Usuários</h1>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
       <p style="color: red;"> {{ session('error') }}</p>
    </div>
    @endif
    <!-- Tabela de Usuários -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- Ação de Editar -->
                        <a href="{{ route('user.edit', $user->id) }}">Editar</a> |
                        <!-- Ação de Excluir -->
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{ route('user.create') }}">Criar Novo Usuário</a>
@endsection
