@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Amigos</div>

                <div class="card-body">
                    @if($friends->isEmpty())
                        <div class="alert alert-info">
                            Você ainda não tem amigos adicionados.
                        </div>
                    @else
                        <ul class="list-group">
                            @foreach($friends as $friend)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $friend->name }}
                                    <!-- Você pode adicionar ações aqui como remover amigo -->
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>