@extends('master')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-background p-4">
    <div class="w-full max-w-[400px] relative">
        <!-- Decorative elements -->
        <div class="absolute -top-20 -left-20 w-40 h-40 bg-primary/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -right-20 w-40 h-40 bg-secondary/20 rounded-full blur-3xl"></div>

        <!-- Main card -->
        <div class="relative bg-surface/60 backdrop-blur-md border border-white/10 rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold mb-3">
                    <span class="text-primary">Meet</span>
                    <span class="text-text">&</span>
                    <span class="text-secondary">Music</span>
                </h1>
                <p class="text-text-light/80 text-lg">Bem-vindo de volta!</p>
            </div>

            <form class="space-y-5" action="{{ route('login.store') }}" method="POST">
                @csrf

                @if($errors->has('error'))
                    <div class="bg-red-900/10 border border-red-500/20 text-red-400 px-4 py-3 rounded-2xl text-sm backdrop-blur-sm animate-fade-in" role="alert">
                        <span class="block sm:inline">{{ $errors->first('error') }}</span>
                    </div>
                @endif

                <div class="space-y-2">
                    <input id="email" name="email" type="email" required
                        class="w-full px-4 py-3.5 bg-background/40 border border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-text placeholder-text-light/40 backdrop-blur-sm transition-all hover:border-white/20"
                        placeholder="Email"
                        value="{{ old('email') }}">
                </div>

                <div class="space-y-2">
                    <input id="password" name="password" type="password" required
                        class="w-full px-4 py-3.5 bg-background/40 border border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-text placeholder-text-light/40 backdrop-blur-sm transition-all hover:border-white/20"
                        placeholder="Senha">
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember_me" type="checkbox"
                            class="h-4 w-4 text-primary focus:ring-primary/50 border-white/10 rounded-lg bg-background/40 hover:border-white/20 transition-all">
                        <label for="remember_me" class="ml-2 text-sm text-text-light/80">
                            Lembrar-me
                        </label>
                    </div>

                    <a href="#" class="text-primary hover:text-primary/80 transition-colors text-sm">
                        Esqueceu sua senha?
                    </a>
                </div>

                <button type="submit"
                    class="w-full py-3.5 px-4 bg-primary hover:bg-primary/90 text-white rounded-2xl font-medium transition-all shadow-lg shadow-primary/20 hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-0.5">
                    Entrar
                </button>
            </form>

            <div class="mt-8 text-center">
                <span class="text-text-light/80">Não tem uma conta?</span>
                <a href="{{ route('user.create') }}" class="text-primary hover:text-primary/80 transition-colors ml-1 font-medium hover:underline">
                    Cadastre-se
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
