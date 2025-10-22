/** @type {import('tailwindcss').Config} */
export default  {

    content: [
        './**/*.blade.php',
        './**/*.js'
    ],
    theme: {
      extend: {
        fontSize: {
          '2xs': 'var(--font-size-2xs)', 
        },
      },
    },
  };