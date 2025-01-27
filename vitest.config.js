import { defineConfig } from 'vitest/config';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js',
            '@': path.resolve(__dirname, 'resources/js')
        }
    },
    plugins: [vue()],
    test: {
        globals: true,
        environment: 'jsdom'
    }
});
