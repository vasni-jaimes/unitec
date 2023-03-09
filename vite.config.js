import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/general.scss',
                    'resources/css/login.scss',
                    'resources/css/register.scss', 
                    'resources/js/register.js',
                    'resources/js/functions.js',
                    'resources/js/validations.js',
                    'resources/js/login.js'],
            refresh: true,
        }),
    ],
});
