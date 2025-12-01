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
    // BARIS BARU INI YANG BIKIN SEMUA JADI BENAR
    base: process.env.NODE_ENV === 'development' 
          ? process.env.ASSET_URL 
          : '/',
});