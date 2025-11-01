export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./public/assets/**/*.css",
  ],
  theme: {
    extend: {
      colors: {
        mint: {
          50: '#f0f9f7',
          100: '#dcf1ee',
          200: '#b9e4de',
          DEFAULT: '#78c2b6',
          600: '#46a79a',
          700: '#389589',
          dark: '#2a7268',
          light: '#A7FED0'
        },
      },
    },
  },
  plugins: [],
}
