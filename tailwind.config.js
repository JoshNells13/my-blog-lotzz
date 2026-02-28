/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        dark: {
          900: '#0f0f0f',
          800: '#111111',
          700: '#1a1a1a',
        }
      },
      fontFamily: {
        sans: ['Inter', 'Poppins', 'sans-serif'],
      },
      animation: {
        'gradient-x': 'gradient-x 15s ease infinite',
        'fade-in': 'fade-in 1s ease-out forwards',
      },
      keyframes: {
        'gradient-x': {
          '0%, 100%': { 'background-size': '200% 200%', 'background-position': 'left center' },
          '50%': { 'background-size': '200% 200%', 'background-position': 'right center' },
        },
        'fade-in': {
          '0%': { opacity: '0', transform: 'translateY(10px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        }
      }
    },
  },
  plugins: [],
}
