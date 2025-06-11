@extends('layouts.app')

@section('content')

<div class="mt-6 bg-white shadow-sm rounded-lg p-6">
    <h2 class="text-lg font-medium text-gray-900 mb-4">Quiz da Lição</h2>

    <form method="POST" action="{{ route('lessons.submit', $lesson->id) }}">
        @csrf

        @foreach ($lesson->questions as $question)
            <div class="mb-6">
                <p class="font-semibold text-gray-800 mb-2">{{ $loop->iteration }}. {{ $question->question }}</p>

                <div class="space-y-2">
                    @foreach ($question->alternatives as $alternative)
                        <label class="flex items-center space-x-2">
                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $alternative->id }}"
                                class="text-blue-600 focus:ring-blue-500 border-gray-300"
                                required
                            >
                            <span class="text-gray-700">{{ $alternative->text }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            @if (!$loop->last)
                <hr class="my-6 border-gray-200">
            @endif
        @endforeach

        <button type="submit" class="mt-4 w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            Enviar Respostas
        </button>
    </form>
</div>
