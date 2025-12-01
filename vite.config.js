import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    base: process.env.NODE_ENV === 'production'
        ? `${process.env.ASSET_URL}/`   // ← ini yang bikin asset pake full URL
        : '/',
});