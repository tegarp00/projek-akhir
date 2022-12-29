/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily: {
      'sans': ['Rubik'],
      'serif': ['Rubik'],
      'mono': ['Rubik'],
      'display': ['Rubik'],
      'body': ['Rubik'],
    },
    container: {
      screens: {
        xl: "1024px",
      },
      center: true,
    },
  },
  plugins: [],
}
