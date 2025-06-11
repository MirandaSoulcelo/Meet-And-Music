import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
        ],
        server: {
            host: env.VITE_SERVER_HOST || '0.0.0.0',
            port: 5173,
            hmr: {
                host: env.VITE_CLIENT_HOST || 'localhost',
            },
            // Ativa o Polling para detectar mudanças no Docker
            watch: {
                usePolling: true,
                interval: 1000, 
            },
        },
    };
}); 