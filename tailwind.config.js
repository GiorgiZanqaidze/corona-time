/** @type {import('tailwindcss').Config} */
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      'green': '#0FBA68;',
      'white': '#ffffff',
      'blue': '#2029F3',
      'yellow': '#EAD621',
      'dark': "#010414",
      'gray': '#808189',
      'bermuda': '#78dcca',
      'error-red': '#CC1E1E',
      'light-gray': '#F6F6F7',
    },
    screens: {
      'sm': '576px',
      'md': '960px',
      'lg': '1440px',
    },
    extend: {
      opacity: {
        '08': '.08',
      }
    },
  },
  
  plugins: [
    require('tailwind-scrollbar')({ nocompatible: true }),
  ],
}