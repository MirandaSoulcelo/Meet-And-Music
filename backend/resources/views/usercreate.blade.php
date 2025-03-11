<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Usuário</title>
</head>
<body>
    <h1>Criação de Usuário</h1>

    <!-- Mensagem de sucesso após criação -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="password_confirmation">Confirmar Senha:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required><br>

        <button type="submit">Criar Usuário</button>
    </form>

</body>
</html>
