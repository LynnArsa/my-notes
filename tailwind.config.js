/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'poppins': ['Poppins'],
     }
    },
    colors: {
      'primary': '#E49F4E',
      'secondary': '#FCB660',
      'body': '#F6F6F6',
      'red':'#F25156',
      'white': '#FFFFFF',
      'gray': '#9A9A9A',
    },
  },
  plugins: [],
}