<!-- resources/views/join-call.blade.php -->
@extends('master')

@section('content')
<div class="container">
    <h3>Entrar em uma chamada</h3>

    <form method="GET" action="{{ route('video.call.join') }}">
        <div class="form-group">
            <label for="meetingId">Código da chamada</label>
            <input type="text" name="meetingId" id="meetingId" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Entrar</button>
    </form>
</div>
@endsection
