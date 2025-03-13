import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/flowbite-admin.css',
                'resources/js/app.js',
                'resources/js/app.bundle.js',
            ],
            refresh: false,
        }),
    ],
});
