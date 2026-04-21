import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import tailwindcss from '@tailwindcss/vite'
import kirby from 'vite-plugin-kirby'

export default defineConfig({
  plugins: [
    vue(),
    tailwindcss(),
    kirby(),
  ],
  server: {
    cors: true,
    origin: 'http://localhost:5173',
  },
  publicDir: false,
  build: {
    outDir: 'public/dist',
    rollupOptions: {
      input: 'src/main.js',
    },
  },
})
