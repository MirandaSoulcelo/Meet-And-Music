<h1>Pedidos Enviados</h1>
<ul>
@foreach ($requests as $user)
    <li>{{ $user->name }} (Aguardando)</li>
@endforeach
</ul>
