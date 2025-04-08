<form action="{{ route('lessons.quiz.submit', $lesson->id) }}" method="POST">
    @csrf

    @foreach($lesson->questions as $question)
        <div>
            <p><strong>{{ $question->title }}</strong></p>
            @foreach($question->alternatives as $alternative)
                <label>
                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $alternative->id }}">
                    {{ $alternative->text }}
                </label><br>
            @endforeach
        </div>
        <hr>
    @endforeach

    <button type="submit">Enviar Respostas</button>
</form>
