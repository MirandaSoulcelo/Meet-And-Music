@extends('layouts.app')
<script>
document.getElementById('meeting_input').addEventListener('paste', function(e) {
    setTimeout(() => {
        let value = this.value;
        // Se colou um link, extrair apenas o ID
        if (value.includes('video-call/')) {
            let meetingId = value.split('video-call/').pop();
            this.value = meetingId;
        }
    }, 100);
});
</script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Entrar em uma Reunião</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('meeting.join.process') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="meeting_input" class="form-label">
                                Código da Reunião ou Link
                            </label>
                            <input
                                type="text"
                                class="form-control @error('meeting_input') is-invalid @enderror"
                                id="meeting_input"
                                name="meeting_input"
                                placeholder="Ex: ABC123XYZ ou cole o link completo"
                                value="{{ old('meeting_input') }}"
                                required
                            >
                            @error('meeting_input')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                Você pode inserir o código da reunião ou colar o link completo
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Entrar na Reunião
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
