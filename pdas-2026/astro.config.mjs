// @ts-check
import { defineConfig } from 'astro/config';
import tailwindcss from '@tailwindcss/vite';

// https://astro.build/config
export default defineConfig({
  site: 'https://learnomail.github.io',
  base: '/pdas-2026',

  vite: {
    plugins: [tailwindcss()]
  }
});