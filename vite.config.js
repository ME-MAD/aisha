import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/home/home.js',
                'resources/js/report/payment.js',
                'resources/js/teacher/experience.js',
                'resources/js/group/payment.js',
            ],
            refresh: true,
        }),
    ],
});
