import { resolve } from 'path'
import { defineConfig } from 'vite'

export default defineConfig({
    build: {
        lib: {
            entry: resolve(__dirname, 'src/js/main.js'),
            name: 'geonosis',
            fileName: (format) => `app.${format}.js`
        },
        outDir: 'dist'
    }
})
