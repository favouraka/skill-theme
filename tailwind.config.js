import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        primary: '#334155', // slate-700
        secondary: '#60a5fa', // blue-400
        tertiary: '#e6c4a3', // golden beige
        lightGray: '#f8f9fa',
      }
    },
  },

  plugins: [
    typography
  ],
}

