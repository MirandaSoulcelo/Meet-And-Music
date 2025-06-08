@extends('master')

@section('content')
<style>
    body {
        background: #fff2af !important;
        font-family: 'Roboto', sans-serif !important;
    }
    .signup-bg {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        background: #fff2af;
    }
    .signup-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 32px 0 rgba(0,0,0,0.10);
        width: 100%;
        max-width: 420px;
        margin: 3vw 6vw 3vw 0;
        padding: 2.5rem 2rem 2rem 2rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .signup-title {
        font-family: 'Roboto', sans-serif;
        font-size: 1.7rem;
        font-weight: 700;
        color: #000000;
        margin-bottom: 2rem;
        text-align: left;
    }
    .signup-label {
        font-family: 'Roboto', sans-serif;
        font-size: 1rem;
        color: #000000;
        margin-bottom: 0.3rem;
        font-weight: 500;
    }
    .signup-input {
        width: 100%;
        padding: 0.85rem 1rem;
        border: 1.5px solid #7cb490;
        border-radius: 7px;
        font-size: 1rem;
        color: #000000;
        font-family: 'Roboto', sans-serif;
        background: #fff;
        margin-bottom: 1.2rem;
        outline: none;
        transition: border 0.2s;
    }
    .signup-input:focus {
        border-color: #d31900;
    }
    .signup-btn {
        width: 100%;
        background: #d31900;
        color: #fff;
        font-family: 'Roboto', sans-serif;
        font-weight: 700;
        font-size: 1.1rem;
        border: none;
        border-radius: 7px;
        padding: 0.95rem 0;
        margin-top: 0.5rem;
        margin-bottom: 1.5rem;
        cursor: pointer;
        transition: background 0.2s;
        box-shadow: 0 2px 8px 0 rgba(211,25,0,0.08);
    }
    .signup-btn:hover {
        background: #b91500;
    }
    .signup-link {
        text-align: right;
        font-size: 0.98rem;
        font-family: 'Roboto', sans-serif;
        color: #000000;
    }
    .signup-link a {
        color: #d31900;
        font-weight: 700;
        text-decoration: none;
        margin-left: 0.2rem;
        transition: color 0.2s;
    }
    .signup-link a:hover {
        color: #ff6600;
    }
    @media (max-width: 900px) {
        .signup-bg { justify-content: center; }
        .signup-card { margin: 3vw 0; }
    }
    @media (max-width: 600px) {
        .signup-card { max-width: 98vw; padding: 1.5rem 0.7rem; }
    }
</style>
<div class="signup-bg">
    <div class="signup-card">
        <div class="signup-title">Criar Conta</div>
        <form action="{{ route('user.store') }}" method="POST" autocomplete="off">
            @csrf
            @if($errors->any())
                <div style="background:#fff2af;border:1px solid #d31900;color:#d31900;padding:0.7rem 1rem;border-radius:7px;font-size:0.98rem;margin-bottom:1rem;">
                    <ul style="margin:0;padding-left:1.1em;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label for="email" class="signup-label">Email</label>
            <input id="email" name="email" type="email" class="signup-input" placeholder="email@exemplo.com" required value="{{ old('email') }}">

            <label for="password" class="signup-label">Senha</label>
            <input id="password" name="password" type="password" class="signup-input" placeholder="Digite sua senha" required>

            <label for="password_confirmation" class="signup-label">Repetir Senha</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="signup-input" placeholder="Repita sua senha" required>

            <button type="submit" class="signup-btn">Cadastrar</button>
        </form>
        <div class="signup-link">
            Já possui uma conta?
            <a href="{{ route('login.index') }}">Entrar</a>
        </div>
    </div>
</div>
@endsection
