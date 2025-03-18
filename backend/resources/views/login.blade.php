@extends('master')


@section('content')

<a href="{{route('home')}}">Home</a>

    <h2>Login</h2>

    <form action="{{route('login.store')}}" method="post">
        @csrf
        <input type="text" name="email" required>
        <input type="password" name="senha" required>
        <button type="submit">Login</button>
    </form>


@endsection
