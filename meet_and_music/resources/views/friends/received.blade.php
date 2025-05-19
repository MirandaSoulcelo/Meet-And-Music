<h1>Pedidos Recebidos</h1>
<ul>
@foreach ($requests as $user)
    <li>
        {{ $user->name }}
        <form method="POST" action="{{ route('friends.accept', $user->id) }}">
            @csrf
            <button type="submit">Aceitar</button>
        </form>
    </li>
@endforeach
</ul>
