import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'themes/byteland/css/app.css',
                'themes/byteland/js/app.js',
            ],
            buildDirectory: 'byteland',
            refresh: false,
        }),
        tailwindcss(),
    ],
})
