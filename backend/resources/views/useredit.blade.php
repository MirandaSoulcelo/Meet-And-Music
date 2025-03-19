<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>

    
    @if (!auth()->check())
    <script>window.location.href = "{{ route('login.index') }}";</script>
    @endif


    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- Método PUT para atualizar o usuário -->

        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required><br>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password"><br>

        <label for="password_confirmation">Confirmar Senha:</label>
        <input type="password" id="password_confirmation" name="password_confirmation"><br>

        <button type="submit">Atualizar Usuário</button>
    </form>

    <br>
    <a href="{{ route('users.index') }}">Voltar para a lista</a>
</body>
</html>
