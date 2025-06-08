<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Redirecionando</title>
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script>
        setTimeout(function() {
            window.location.href = '/';
        }, 3000);
    </script>
    <style>
        body {
            min-height: 100vh;
            background: var(--background);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logout-card {
            max-width: 400px;
            width: 100%;
            background: var(--surface);
            border-radius: var(--border-radius-lg);
            border: 1px solid var(--border);
            padding: 1.5rem;
            box-shadow: var(--shadow-md);
            text-align: center;
        }
        .logout-card h2 {
            color: var(--text);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .logout-card p {
            color: var(--text-light);
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="logout-card">
        <h2>Aguarde, você está sendo direcionado para a tela inicial...</h2>
        <p>Logout realizado com sucesso.</p>
    </div>
</body>
</html>
