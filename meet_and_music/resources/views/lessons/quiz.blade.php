@extends('layouts.app')

@section('content')
<div class="content-card">
    <h1 class="card-title">Quiz da Lição: {{ $lesson->title }}</h1>

    <form method="POST" action="{{ route('lessons.submit', $lesson->id) }}" class="mt-6">
        @csrf

        @foreach ($lesson->questions as $question)
            {{-- Cada questão agora é seu próprio card com a classe .quiz-question-card --}}
            <div class="quiz-question-card">
                <p class="quiz-question-text">{{ $loop->iteration }}. {{ $question->question }}</p>

                {{-- Container para as alternativas com o espaçamento de 4px --}}
                <div class="quiz-alternatives-container">
                    @foreach ($question->alternatives as $alternative)
                        <label class="quiz-alternative">
                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $alternative->id }}"
                                required
                            >
                            <span class="radio-indicator"></span>
                            <span class="text-text-light">{{ $alternative->text }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="quiz-submit-container">
            <button type="submit" class="btn btn-primary w-full">
                Enviar Respostas
            </button>
        </div>
    </form>
</div>
@endsection
