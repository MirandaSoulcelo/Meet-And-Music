<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet & Music - Aprenda Música de Forma Social</title>
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-background text-text antialiased">
    <!-- Header -->
    <x-navbar />

    <!-- Main Content -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <main class="main-content">
            @if (session('success'))
                <x-alert type="success" :message="session('success')" />
            @endif

            @if(session('error'))
                <x-alert type="error" :message="session('error')" />
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <x-footer />
</body>
</html>

