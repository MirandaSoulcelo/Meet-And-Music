@extends('layouts.app')

@section('content')
<div class="auth-container">
    {{-- Seção do Formulário (Esquerda) --}}
    <div class="auth-form-section">
        <div class="auth-card">
            <h1 class="auth-title">Bem-vindo de volta!</h1>
            <p class="auth-subtitle">Faça login para continuar sua jornada musical.</p>

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" id="password" name="password" class="form-input" required>
                </div>

                <a href="#" class="auth-link">Esqueceu a senha?</a>

                <button type="submit" class="btn btn-primary auth-button">Entrar</button>

                <p class="auth-footer-link">
                    Não tem uma conta? <a href="{{ route('user.create') }}">Crie agora</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
