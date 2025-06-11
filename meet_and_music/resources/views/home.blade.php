@extends('layouts.app')

@section('content')
    <header class="header">
        <div class="header-content">
            <a href="/home" class="text-5xl font-bold">
                <span class="text-primary">Meet</span>
                <span class="text-text">&</span>
                <span class="text-secondary">Music</span>
            </a>
            <nav class="nav-links">
                <a href="/login" class="btn btn-outline">Entrar</a>
                <a href="/usercreate" class="btn btn-primary">Começar Agora</a>
            </nav>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-content">
                <div class="floating-card">
                    <h1 class="text-5xl font-bold mb-8">
                        Bem-vindo ao <span class="text-gradient">Meet & Music!</span>
                    </h1>
                    <p class="text-xl text-text-light mb-8">
                        A plataforma inovadora que transforma o aprendizado musical em uma jornada interativa e envolvente.
                        Aqui, você encontra trilhas de aprendizado gamificadas, desafios dinâmicos e uma comunidade vibrante
                        para crescer musicalmente.
                    </p>
                    <a href="/usercreate" class="btn btn-primary">
                        Comece sua jornada musical
                    </a>
                </div>
                <div class="floating-card">
                    <img src="{{ asset('images/vinyl.jpg') }}" alt="Vinil em fundo azul" class="rounded-[24px] w-full">
                </div>
            </div>
        </section>

        <!-- Escolha Seu Caminho -->
        <section class="feature-block">
            <div class="feature-content">
                <div class="floating-card">
                    <h2 class="text-4xl font-bold mb-6">
                        Escolha Seu <span class="text-gradient">Caminho Musical</span>
                    </h2>
                    <p class="text-text-light mb-6">
                        Explore trilhas de aprendizado para diversos instrumentos e estilos musicais.
                        Com conteúdos interativos e desafios progressivos, você aprende no seu ritmo e de forma divertida.
                    </p>
                    <ul class="feature-list">
                        <li>Violão, guitarra, piano e muito mais!</li>
                        <li>Lições interativas e exercícios práticos</li>
                        <li>Aulas organizadas por nível de habilidade</li>
                    </ul>
                </div>
                <div class="floating-card">
                    <img src="{{ asset('images/amplifiers.jpg') }}" alt="Parede de amplificadores" class="rounded-[24px] w-full">
                </div>
            </div>
        </section>

        <!-- Supere Desafios -->
        <section class="feature-block">
            <div class="feature-content">
                <div class="floating-card">
                    <img src="{{ asset('images/cassette.jpg') }}" alt="Fita cassete flutuando" class="rounded-[24px] w-full">
                </div>
                <div class="floating-card">
                    <h2 class="text-4xl font-bold mb-6">
                        Supere <span class="text-gradient">Desafios</span> e Evolua!
                    </h2>
                    <p class="text-text-light mb-6">
                        Torne-se um mestre do seu instrumento ao completar desafios musicais e ganhar recompensas.
                    </p>
                    <ul class="feature-list">
                        <li>Participe de missões temáticas</li>
                        <li>Melhore suas habilidades com desafios práticos</li>
                        <li>Conquiste pontos e suba no ranking!</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- CTA Final -->
        <section class="cta-section">
            <div class="cta-content">
                <div class="floating-card">
                    <h2 class="text-4xl font-bold mb-6">
                        Entre para a <span class="text-gradient">Comunidade Global</span> de Músicos!
                    </h2>
                    <p class="text-xl text-text-light mb-8">
                        Aprenda, pratique e se divirta com músicos de todo o mundo.
                        No Meet & Music, a música é uma jornada compartilhada!
                    </p>
                    <a href="/usercreate" class="btn btn-primary">
                        Cadastre-se gratuitamente
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
