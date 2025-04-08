@foreach($lesson->questions as $question)
    <p><strong>{{ $question->title }}</strong></p>

    @foreach($question->alternatives as $alternative)
        @php
            $color = 'black';
            if ($alternative->is_correct) {
                $color = 'green';
            } elseif (isset($answers[$question->id]) && $answers[$question->id] == $alternative->id) {
                $color = 'red';
            }
        @endphp

        <p style="color: {{ $color }};">
            {{ $alternative->text }}
        </p>
    @endforeach

    <hr>
@endforeach

<p>Você acertou {{ $acertos }} de {{ $lesson->questions->count() }}.</p>
<p>XP ganho: {{ $xpGanho }}</p>
