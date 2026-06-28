// astro.config.mjs
import { defineConfig } from 'astro/config';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  site: 'https://pdas.org.in', // Your new production domain
  
  vite: {
    plugins: [tailwindcss()]
  }
});