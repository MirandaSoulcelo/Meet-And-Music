@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Solicitações de Amizade</div>

                <div class="card-body">
                    <ul class="nav nav-tabs" id="requestsTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="received-tab" data-bs-toggle="tab" data-bs-target="#received" type="button" role="tab">Recebidas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="sent-tab" data-bs-toggle="tab" data-bs-target="#sent" type="button" role="tab">Enviadas</button>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="requestsTabsContent">
                        <div class="tab-pane fade show active" id="received" role="tabpanel">
                            @if($receivedRequests->count() > 0)
                                <div class="list-group">
                                    @foreach($receivedRequests as $request)
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <img src="{{ asset('storage/avatars/' . ($request->avatar ?? 'default.png')) }}" class="rounded-circle me-2" width="30" height="30">
                                                {{ $request->name }}
                                            </div>
                                            <div>
                                                <form action="{{ route('friends.accept', $request->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success me-1">Aceitar</button>
                                                </form>
                                                <form action="{{ route('friends.reject', $request->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                   
                                                    <button type="submit" class="btn btn-sm btn-danger">Recusar</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info">Nenhuma solicitação recebida.</div>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="sent" role="tabpanel">
                            @if($sentRequests->count() > 0)
                                <div class="list-group">
                                    @foreach($sentRequests as $request)
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <img src="{{ asset('storage/avatars/' . ($request->avatar ?? 'default.png')) }}" class="rounded-circle me-2" width="30" height="30">
                                                {{ $request->name }}
                                            </div>
                                            <span class="badge bg-warning">Pendente</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info">Nenhuma solicitação enviada.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection