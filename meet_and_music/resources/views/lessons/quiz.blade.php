<form method="POST" action="{{ route('lessons.submit', $lesson->id) }}">
    @csrf

    @foreach ($lesson->questions as $question)
        <div>
            <p><strong>{{ $question->question }}</strong></p>
            @foreach ($question->alternatives as $alternative)
                <label>
                    <input 
                        type="radio" 
                        name="answers[{{ $question->id }}]" 
                        value="{{ $alternative->id }}"
                        required
                    >
                    {{ $alternative->text }}
                </label><br>
            @endforeach
        </div>
        <hr>
    @endforeach

    <button type="submit">Enviar Respostas</button>
</form>
