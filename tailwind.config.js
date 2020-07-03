module.exports = {
  purge: [
    "app/**/*.php",
    "resources/**/*.html",
    "resources/**/*.js",
    "resources/**/*.jsx",
    "resources/**/*.ts",
    "resources/**/*.tsx",
    "resources/**/*.php",
    "resources/**/*.vue",
    "resources/**/*.twig"
  ],
  theme: {
    extend: {
        spacing:{
            '4/3': '4.3rem',
        },
        width: {
          '3/10' : '144%',
          '33' : '8.44rem'
        },
        fontFamily: {
            // roboto: ['Roboto'],
        },
        colors: {
            'primary': '#30BCED', //blue
            'secondary': '#F56565', //red
            'third': '#2A4365', //dark blue
            'dark': '#2D3748',//black
            'footer': '#F8FAFC',//light white
            'light-gray' : '#E2E8F0',
            'second-gray': '#718096',//gray
        }
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/custom-forms')
  ]
}
