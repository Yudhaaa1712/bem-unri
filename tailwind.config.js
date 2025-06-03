/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'biru-langit': {
          50: '#e6f3ff',
          100: '#b3d9ff',
          200: '#80bfff',
          300: '#4da6ff',
          400: '#1a8cff',
          500: '#0066cc',
          600: '#0052a3',
          700: '#003d7a',
          800: '#002952',
          900: '#001429'
        },
        'kuning-emas': {
          50: '#fffdf0',
          100: '#fffacc',
          200: '#fff799',
          300: '#fff166',
          400: '#ffeA33',
          500: '#ffcc00',
          600: '#e6b800',
          700: '#cc9900',
          800: '#b37a00',
          900: '#995c00'
        }
      },
      fontFamily: {
        'sans': ['Inter', 'system-ui', 'sans-serif']
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}