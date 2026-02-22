/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Poppins', 'sans-serif'],
      },
      colors: {
        bone: {
          50: '#fdfcfb',
          100: '#f9f7f4',
          200: '#f5f1ec',
          300: '#f0ebe3',
          400: '#ebe5db',
          500: '#e6dfd2',  // Main bone color
          600: '#d4c9b8',
          700: '#c2b39e',
          800: '#9d8f7a',
          900: '#786b5b',
        },
        primary: {
          DEFAULT: '#000000', // black
          light: '#1a1a1a',
          dark: '#000000',
        },
        secondary: {
          DEFAULT: '#ffffff', // white
          dark: '#f5f5f5',
        }
      }
    },
  },
  plugins: [],
}
