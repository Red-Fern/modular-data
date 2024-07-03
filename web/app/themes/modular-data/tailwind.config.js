/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./parts/**/*.html",
    "./patterns/**/*.php",
    "./templates/**/*.html",
    "./resources/js/**/*.js",
    "./resources/gutenberg/**/*.{js,php}",
    "./acf/**/*.php",
  ],
  theme: {
    fontFamily: {
      'sans': 'var(--wp--preset--font-family--dm-sans)',
      'serif': 'var(--wp--preset--font-family--dm-serif)',
      'mono': 'var(--wp--preset--font-family--dm-mono)'
    },
    fontSize: {
      '2xs': 'var(--wp--preset--font-size--xxs)',
      'xs': 'var(--wp--preset--font-size--xs)',
      'sm': 'var(--wp--preset--font-size--sm)',
      'base': 'var(--wp--preset--font-size--base)',
      'md': 'var(--wp--preset--font-size--md)',
      'lg': 'var(--wp--preset--font-size--lg)',
      'xl': 'var(--wp--preset--font-size--xl)',
      '2xl': 'var(--wp--preset--font-size--xxl)',
      '3xl': 'var(--wp--preset--font-size--xxxl)',
      '4xl': 'var(--wp--preset--font-size--xxxxl)'
    },
    extend: {
      colors: {
        'purple': 'var(--wp--preset--color--purple)',
        'dark-teal': 'var(--wp--preset--color--dark-teal)',
        'light-teal': 'var(--wp--preset--color--light-teal)',
        'light-blue': 'var(--wp--preset--color--light-blue)',
        'yellow': 'var(--wp--preset--color--yellow)',
        'black': 'var(--wp--preset--color--black)',
        'dark-grey': 'var(--wp--preset--color--dark-grey)',
        'mid-grey': 'var(--wp--preset--color--mid-grey)',
        'light-grey': 'var(--wp--preset--color--light-grey)',
        'white': 'var(--wp--preset--color--white)'
      },
      spacing: {
        'xs': 'var(--wp--preset--spacing--xs)',
        'sm': 'var(--wp--preset--spacing--sm)',
        'md': 'var(--wp--preset--spacing--md)',
        'lg': 'var(--wp--preset--spacing--lg)',
        'xl': 'var(--wp--preset--spacing--xl)',
        '2xl': 'var(--wp--preset--spacing--xxl)'
      },
      screens: {
        'md': '782px',
      },
    },
  },
  safelist: [],
  corePlugins: {
    preflight: false
  },
  plugins: [],
}

