@extends('master')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-background p-4">
    <div class="flex w-full max-w-[1100px] items-center justify-between">
        <!-- Left side with images -->
        <div class="relative hidden md:block w-[30%] h-[600px]">
            <!-- First card with amplifiers -->
            <div class="absolute top-[20%] left-[10%] w-[280px] h-[400px] transform rotate-[12deg] z-10 overflow-hidden rounded-[32px] shadow-2xl">
                <img src="{{ asset('images/amplifiers_bw.jpg') }}" alt="Amplifiers" class="w-full h-full object-cover opacity-80">
            </div>
            <!-- Second card with cassette -->
            <div class="absolute top-[25%] left-[15%] w-[280px] h-[400px] transform -rotate-[12deg] overflow-hidden rounded-[32px] shadow-2xl">
                <img src="{{ asset('images/cassette.jpg') }}" alt="Cassette" class="w-full h-full object-cover opacity-80">
            </div>
        </div>

        <!-- Right side with registration form -->
        <div class="w-full md:w-[55%] max-w-[420px]">
            <div class="bg-surface/60 backdrop-blur-md border border-white/10 rounded-[32px] p-10 shadow-xl">
                <div class="text-center mb-10">
                    <h1 class="text-5xl font-bold mb-4">
                        <span class="text-primary">Meet</span>
                        <span class="text-text">&</span>
                        <span class="text-secondary">Music</span>
                    </h1>
                    <div class="flex justify-center gap-6 text-sm text-text-light/80">
                        <span class="hover:text-primary transition-colors cursor-pointer">Aprender</span>
                        <span class="hover:text-primary transition-colors cursor-pointer">Revisar</span>
                        <span class="hover:text-primary transition-colors cursor-pointer">Comunidade</span>
                        <span class="hover:text-primary transition-colors cursor-pointer">Cursos</span>
                    </div>
                </div>

                <h2 class="text-2xl font-bold text-primary mb-8 text-center">Crie sua conta</h2>

                <form class="space-y-5" action="{{ route('user.store') }}" method="POST">
                    @csrf

                    @if($errors->any())
                        <div class="bg-red-900/10 border border-red-500/20 text-red-400 px-6 py-4 rounded-2xl text-sm backdrop-blur-sm" role="alert">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <input id="name" name="name" type="text" required
                            class="w-full px-6 py-4 bg-background/40 border border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-text placeholder-text-light/40 backdrop-blur-sm transition-all"
                            placeholder="Nome completo"
                            value="{{ old('name') }}">
                    </div>

                    <div>
                        <input id="email" name="email" type="email" required
                            class="w-full px-6 py-4 bg-background/40 border border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-text placeholder-text-light/40 backdrop-blur-sm transition-all"
                            placeholder="Email"
                            value="{{ old('email') }}">
                    </div>

                    <div>
                        <input id="password" name="password" type="password" required
                            class="w-full px-6 py-4 bg-background/40 border border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-text placeholder-text-light/40 backdrop-blur-sm transition-all"
                            placeholder="Senha">
                    </div>

                    <div>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="w-full px-6 py-4 bg-background/40 border border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-text placeholder-text-light/40 backdrop-blur-sm transition-all"
                            placeholder="Confirme sua senha">
                    </div>

                    <div>
                        <select id="instrument" name="instrument"
                            class="w-full px-6 py-4 bg-background/40 border border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-text placeholder-text-light/40 backdrop-blur-sm transition-all">
                            <option value="" class="text-text-light/50">Selecione um instrumento</option>
                            <option value="guitar">Guitarra</option>
                            <option value="bass">Baixo</option>
                            <option value="drums">Bateria</option>
                            <option value="piano">Piano</option>
                            <option value="vocals">Vocal</option>
                            <option value="other">Outro</option>
                        </select>
                    </div>

                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" required
                            class="h-5 w-5 text-primary focus:ring-primary/50 border-white/10 rounded-lg bg-background/40">
                        <label for="terms" class="ml-3 text-sm text-text-light/80">
                            Eu concordo com os <a href="#" class="text-primary hover:text-primary/80 transition-colors">termos de serviço</a>
                            e <a href="#" class="text-primary hover:text-primary/80 transition-colors">política de privacidade</a>
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full py-4 px-6 bg-primary hover:bg-primary/90 text-white rounded-2xl font-medium transition-all shadow-lg shadow-primary/20">
                        Criar conta
                    </button>
                </form>

                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-white/10"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-surface text-text-light/60">
                                Ou cadastre-se com
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <a href="#"
                            class="flex items-center justify-center px-6 py-4 border border-white/10 rounded-2xl bg-background/40 text-text-light/80 hover:bg-surface/80 transition-all backdrop-blur-sm">
                            <i class="fab fa-google mr-2"></i>
                            Google
                        </a>
                        <a href="#"
                            class="flex items-center justify-center px-6 py-4 border border-white/10 rounded-2xl bg-background/40 text-text-light/80 hover:bg-surface/80 transition-all backdrop-blur-sm">
                            <i class="fab fa-facebook mr-2"></i>
                            Facebook
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-6 text-center bg-surface/60 backdrop-blur-md border border-white/10 rounded-[32px] p-6 shadow-xl">
                <span class="text-text-light/80">Já tem uma conta?</span>
                <a href="{{ route('login.index') }}" class="text-primary hover:text-primary/80 transition-colors ml-1 font-medium">
                    Entrar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
