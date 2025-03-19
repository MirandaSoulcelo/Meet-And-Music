<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>a</title>
</head>
<body>
    <div>

    @if(auth()->check())
        Welcome {{ auth()->user()->name}} |<a href=" {{ route('login.destroy') }}">Logout</a>
    @else

        <a href="{{route('login')}}">Login</a>

    @endif



        @yield('content')
    </div>
</body>
</html>

