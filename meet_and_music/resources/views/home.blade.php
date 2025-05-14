@extends('master')

@section('content')
<!-- Bloco 1: Apresentação -->
<div class="relative flex flex-col md:flex-row items-center justify-between bg-black rounded-3xl shadow-lg p-8 mb-12 overflow-hidden" style="min-height: 400px;">
    <div class="z-10 md:w-1/2">
        <h1 class="text-4xl md:text-5xl font-extrabold text-orange-500 mb-4 drop-shadow-lg">Meet & Music</h1>
        <p class="text-white text-lg md:text-xl mb-6">Conecte músicos de todos os níveis em uma plataforma gamificada, colaborativa e envolvente. Aprenda, pratique e evolua junto com a comunidade!</p>
        <div class="flex gap-4">
            <a href="{{ route('login.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg transition">Saiba Mais</a>
        </div>
    </div>
    <div class="absolute right-0 bottom-0 md:static md:w-1/2 flex justify-end">
        <img src="/images/pexels-stasknop-1261578.jpg" alt="Cassete" class="w-80 md:w-[420px] rounded-full shadow-2xl object-cover opacity-90" style="clip-path: ellipse(70% 50% at 50% 50%);">
    </div>
</div>

<!-- Bloco 2: Funcionalidades -->
<div class="relative flex flex-col md:flex-row-reverse items-center justify-between bg-white rounded-3xl shadow-lg p-8 mb-12 overflow-hidden">
    <div class="z-10 md:w-1/2">
        <h2 class="text-3xl font-bold text-orange-500 mb-4">Funcionalidades Principais</h2>
        <ul class="text-gray-800 text-lg space-y-3">
            <li><span class="font-bold text-orange-400">•</span> Trilhas de aprendizado para diversos instrumentos</li>
            <li><span class="font-bold text-orange-400">•</span> Desafios musicais interativos</li>
            <li><span class="font-bold text-orange-400">•</span> Ranking e gamificação</li>
            <li><span class="font-bold text-orange-400">•</span> Videochamadas para prática conjunta</li>
        </ul>
    </div>
    <div class="absolute left-0 bottom-0 md:static md:w-1/2 flex justify-start">
        <img src="/images/pexels-mikebirdy-114820.jpg" alt="Alto-falante" class="w-80 md:w-[420px] rounded-full shadow-2xl object-cover opacity-90" style="clip-path: ellipse(70% 50% at 50% 50%);">
    </div>
</div>

<!-- Bloco 3: Objetivo -->
<div class="relative flex flex-col md:flex-row items-center justify-between bg-gray-900 rounded-3xl shadow-lg p-8 mb-12 overflow-hidden">
    <div class="z-10 md:w-1/2">
        <h2 class="text-3xl font-bold text-orange-500 mb-4">Nosso Objetivo</h2>
        <p class="text-white text-lg mb-4">Tornar o aprendizado musical mais imersivo e social, conectando músicos do mundo todo e incentivando a prática contínua de maneira envolvente.</p>
    </div>
    <div class="absolute right-0 bottom-0 md:static md:w-1/2 flex justify-end">
        <img src="/images/pexels-ellis-1389429.jpg" alt="Mesa de som" class="w-80 md:w-[420px] rounded-full shadow-2xl object-cover opacity-90" style="clip-path: ellipse(70% 50% at 50% 50%);">
    </div>
</div>

<!-- Bloco 4: Experiência Musical -->
<div class="relative flex flex-col md:flex-row-reverse items-center justify-between bg-white rounded-3xl shadow-lg p-8 mb-12 overflow-hidden">
    <div class="z-10 md:w-1/2">
        <h2 class="text-3xl font-bold text-orange-500 mb-4">Experiência Musical Completa</h2>
        <p class="text-gray-800 text-lg mb-4">Pratique, compartilhe, desafie-se e evolua em um ambiente pensado para músicos de todos os estilos e níveis. Aqui, a música é vivida em comunidade!</p>
    </div>
    <div class="absolute left-0 bottom-0 md:static md:w-1/2 flex justify-start">
        <img src="/images/pexels-pixabay-373632.jpg" alt="Vinil" class="w-80 md:w-[420px] rounded-full shadow-2xl object-cover opacity-90" style="clip-path: ellipse(70% 50% at 50% 50%);">
    </div>
</div>

<!-- Bloco 5: Comunidade e Referências -->
<div class="relative flex flex-col md:flex-row items-center justify-between bg-gray-900 rounded-3xl shadow-lg p-8 mb-12 overflow-hidden">
    <div class="z-10 md:w-1/2">
        <h2 class="text-3xl font-bold text-orange-500 mb-4">Comunidade Vibrante</h2>
        <p class="text-white text-lg mb-4">Inspire-se, faça amigos e troque experiências. Nossa plataforma é feita para quem ama música e quer crescer junto!</p>
    </div>
    <div class="absolute right-0 bottom-0 md:static md:w-1/2 flex justify-end">
        <img src="/images/pexels-pixabay-159206.jpg" alt="Coleção musical" class="w-80 md:w-[420px] rounded-full shadow-2xl object-cover opacity-90" style="clip-path: ellipse(70% 50% at 50% 50%);">
    </div>
</div>

<!-- Bloco 6: FAQ -->
<div class="bg-white rounded-3xl shadow-lg p-8 mb-12">
    <h2 class="text-3xl font-bold text-orange-500 mb-6">Dúvidas Frequentes</h2>
    <div class="space-y-4">
        <div>
            <h3 class="font-semibold text-gray-900">Como faço para começar?</h3>
            <p class="text-gray-700">Basta criar uma conta gratuita e explorar as trilhas de aprendizado disponíveis para seu instrumento favorito.</p>
        </div>
        <div>
            <h3 class="font-semibold text-gray-900">Preciso ser músico profissional?</h3>
            <p class="text-gray-700">Não! O Meet & Music é para todos: do iniciante ao avançado. O importante é querer aprender e compartilhar experiências.</p>
        </div>
        <div>
            <h3 class="font-semibold text-gray-900">Como funcionam os desafios?</h3>
            <p class="text-gray-700">Os desafios são atividades práticas e interativas para você evoluir e ganhar pontos no ranking da comunidade.</p>
        </div>
        <div>
            <h3 class="font-semibold text-gray-900">Posso praticar com outros músicos?</h3>
            <p class="text-gray-700">Sim! Use as videochamadas para praticar em grupo, trocar dicas e fazer novas amizades musicais.</p>
        </div>
    </div>
</div>
@endsection
