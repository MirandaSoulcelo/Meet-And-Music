<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet & Music - Aprenda Música Online</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Estilos críticos para garantir que a página não quebre */
        :root {
            --primary: #FF5500;
            --secondary: #00B8D4;
            --background: #0F0F13;
            --surface: rgba(34, 34, 34, 0.6);
            --text: #FFFFFF;
            --text-light: rgba(255, 255, 255, 0.8);
            --border: rgba(255, 255, 255, 0.1);
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background-color: var(--background);
            color: var(--text);
            line-height: 1.5;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 1.5rem;
            background: rgba(15, 15, 19, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .text-primary { color: var(--primary); }
        .text-secondary { color: var(--secondary); }
        .text-text { color: var(--text); }
        .text-text-light { color: var(--text-light); }

        .floating-card {
            background: var(--surface);
            backdrop-filter: blur(12px);
            border: 1px solid var(--border);
            border-radius: 32px;
            padding: 2.5rem;
            margin-bottom: 2rem;
        }

        .hero-section {
            padding-top: 120px;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .feature-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 2rem;
            border-radius: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FF5500, #FF8C69);
            color: white;
        }

        .btn-outline {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--border);
            color: var(--text);
        }

        .text-5xl { font-size: 3rem; }
        .text-4xl { font-size: 2.25rem; }
        .text-xl { font-size: 1.25rem; }
        .font-bold { font-weight: 700; }
        .mb-8 { margin-bottom: 2rem; }
        .mb-6 { margin-bottom: 1.5rem; }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 24px;
        }

        @media (max-width: 1024px) {
            .hero-content,
            .feature-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
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
</body>
</html>