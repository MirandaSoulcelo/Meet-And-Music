@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3 px-3 py-2 bg-light">
                <h5 class="mb-0">{{ $meeting->title ?? 'Videochamada' }}</h5>
                <div>
                    <button class="btn btn-sm btn-outline-primary" onclick="copiarLink()">
                        Compartilhar Link
                    </button>
                    <a href="{{ route('meetings.index') }}" class="btn btn-sm btn-secondary">
                        Sair
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <iframe
                id="jitsi-iframe"
                src="https://meet.jit.si/{{ $roomName }}"
                width="100%"
                height="600px"
                style="border: none;"
                allow="camera; microphone; fullscreen; display-capture; autoplay">
            </iframe>
        </div>
    </div>
</div>

<script>
function copiarLink() {
    const link = "{{ url()->current() }}";
    navigator.clipboard.writeText(link).then(() => {
        alert('Link copiado para área de transferência!');
    });
}

// Ajustar altura da iframe
function ajustarAltura() {
    const iframe = document.getElementById('jitsi-iframe');
    iframe.style.height = (window.innerHeight - 100) + 'px';
}

window.addEventListener('load', ajustarAltura);
window.addEventListener('resize', ajustarAltura);
</script>
@endsection
