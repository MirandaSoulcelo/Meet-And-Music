@extends('layouts.app')

@section('content')
<div class="auth-container">
    {{-- Seção do Formulário (Esquerda) --}}
    <div class="auth-form-section">
        <div class="auth-card">
            <h1 class="auth-title">Crie sua Conta</h1>
            <p class="auth-subtitle">Comece sua jornada no Meet&Music hoje mesmo.</p>

            <form action="{{ route('user.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Nome de Usuário</label>
                    <input type="text" id="name" name="name" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" id="password" name="password" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirme sua Senha</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required>
                </div>

                <button type="submit" class="btn btn-primary auth-button">Criar Conta</button>

                <p class="auth-footer-link">
                    Já tem uma conta? <a href="{{ route('login.index') }}">Faça login</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
