<h1>Meus Amigos</h1>
<ul>
@foreach ($friends as $friend)
    <li>{{ $friend->name }}</li>
@endforeach
</ul>
