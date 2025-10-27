/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#D8F3DC',
        accent: '#40916C',
        sidebar: '#E9F7EF',
        textdark: '#1B4332',
        mint: '#E9F7EF',
        mint: {
          DEFAULT: "#A5F3DC",
          dark: "#7BD8BE",
          light: "#D2FFF1",
        },
      },
      fontFamily: {
        sans: ['"Poppins"', 'ui-sans-serif', 'system-ui'],
      },
    },
  },
  plugins: [],
}
