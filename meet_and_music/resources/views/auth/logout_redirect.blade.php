@extends('layouts.app')

@section('content')
    <div class="logout-card">
        <h2>Aguarde, você está sendo direcionado para a tela inicial...</h2>
        <p>Logout realizado com sucesso.</p>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = '/';
        }, 3000);
    </script>
@endsection
