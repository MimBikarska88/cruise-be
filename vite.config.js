import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    esbuild: {
        loader: "jsx",
    },
    plugins: [
        laravel({
            input: ['resources/js/index.jsx'],
            refresh: true,
        }),
        react(),
    ],
});
