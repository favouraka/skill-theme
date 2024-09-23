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
        primary: '#186eff',
        secondary: '#50d95d',
        tertiary: '#2ec6a0',
        lightGray: '#f8f9fa',
      }
    },
  },

  plugins: [],
}

