@extends('master')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-background p-4">
    <div class="flex w-full max-w-[1100px] items-center justify-between">
        <!-- Left side with images -->
        <div class="relative hidden md:block w-[30%] h-[600px]">
            <!-- First card with amplifiers -->
            <div class="absolute top-[20%] left-[10%] w-[280px] h-[400px] transform -rotate-[12deg] z-10 overflow-hidden rounded-[32px] shadow-2xl">
                <img src="{{ asset('images/amplifiers_bw.jpg') }}" alt="Amplifiers" class="w-full h-full object-cover opacity-80">
            </div>
            <!-- Second card with cassette -->
            <div class="absolute top-[25%] left-[15%] w-[280px] h-[400px] transform rotate-[12deg] overflow-hidden rounded-[32px] shadow-2xl">
                <img src="{{ asset('images/cassette.jpg') }}" alt="Cassette" class="w-full h-full object-cover opacity-80">
            </div>
        </div>

        <!-- Right side with edit form -->
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

                <h2 class="text-2xl font-bold text-primary mb-8 text-center">Editar Perfil</h2>
                
                <form class="space-y-5" action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    @if($errors->any())
                        <div class="bg-red-900/10 border border-red-500/20 text-red-400 px-6 py-4 rounded-2xl text-sm backdrop-blur-sm" role="alert">
                            @foreach($errors->all() as $error)
                                <span class="block">{{ $error }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div>
                        <input id="name" name="name" type="text" required 
                            class="w-full px-6 py-4 bg-background/40 border border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-text placeholder-text-light/40 backdrop-blur-sm transition-all"
                            placeholder="Nome completo"
                            value="{{ old('name', $user->name) }}">
                    </div>

                    <div>
                        <input id="email" name="email" type="email" required 
                            class="w-full px-6 py-4 bg-background/40 border border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-text placeholder-text-light/40 backdrop-blur-sm transition-all"
                            placeholder="Email"
                            value="{{ old('email', $user->email) }}">
                    </div>

                    <div>
                        <input id="password" name="password" type="password"
                            class="w-full px-6 py-4 bg-background/40 border border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-text placeholder-text-light/40 backdrop-blur-sm transition-all"
                            placeholder="Nova senha (deixe em branco para manter a atual)">
                    </div>

                    <div>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="w-full px-6 py-4 bg-background/40 border border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-text placeholder-text-light/40 backdrop-blur-sm transition-all"
                            placeholder="Confirmar nova senha">
                    </div>

                    <button type="submit"
                        class="w-full py-4 px-6 bg-primary hover:bg-primary/90 text-white rounded-2xl font-medium transition-all shadow-lg shadow-primary/20">
                        Atualizar Perfil
                    </button>
                </form>

                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-white/10"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-surface text-text-light/60">
                                Outras opções
                            </span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('home') }}"
                            class="flex items-center justify-center px-6 py-4 border border-white/10 rounded-2xl bg-background/40 text-text-light/80 hover:bg-surface/80 transition-all backdrop-blur-sm">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Voltar para Home
                        </a>
                    </div>
                </div>
            </div>

            <!-- Success message card -->
            @if(session('success'))
                <div class="mt-6 text-center bg-green-900/10 border border-green-500/20 backdrop-blur-md rounded-[32px] p-6 shadow-xl">
                    <span class="text-green-400 font-medium">{{ session('success') }}</span>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection