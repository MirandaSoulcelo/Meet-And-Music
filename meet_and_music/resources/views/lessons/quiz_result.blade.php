@extends('master')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Resultado do Quiz</h1>

    <p class="mb-2">Você acertou <strong>{{ $acertos }}</strong> questões.</p>
    <p class="mb-6">Ganhou <strong>{{ $xpGanho }}</strong> XP!</p>

    <div class="space-y-6">
        @foreach ($lesson->questions as $question)
            <div class="p-4 border border-gray-300 rounded">
                <p class="font-semibold mb-2">{{ $loop->iteration }}. {{ $question->question }}</p>

                <ul class="space-y-1">
                    @foreach ($question->alternatives as $alt)
                        <li class="
                            @if ($alt->is_correct)
                                text-green-700 font-semibold
                            @elseif ($answers[$question->id] ?? null == $alt->id)
                                text-red-700
                            @else
                                text-gray-700
                            @endif
                        ">
                            @if ($alt->is_correct)
                                ✅
                            @elseif ($answers[$question->id] ?? null == $alt->id)
                                ❌
                            @else
                                ◻️
                            @endif
                            {{ $alt->text }}
                        </li>
                    @endforeach
                </ul>

                @if (!isset($answers[$question->id]))
                    <p class="text-red-500 mt-2">Você não respondeu essa pergunta.</p>
                @endif
            </div>
        @endforeach
    </div>
@endsection
