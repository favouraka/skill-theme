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
        primary: '#0c343d',
        secondary: '#45818e',
        accent: '#9fc5e8',
        tertiary: '#d9c6b0', // golden beige
        lightGray: '#f8f9fa',
      }
    },
  },

  plugins: [
    typography
  ],
}

