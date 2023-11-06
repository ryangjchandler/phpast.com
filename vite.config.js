import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import monacoEditorPlugin from 'vite-plugin-monaco-editor';

export default defineConfig({
    plugins: [
        monacoEditorPlugin,
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
