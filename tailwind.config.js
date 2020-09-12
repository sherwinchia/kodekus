module.exports = {
  purge: [],
  theme: {
    extend: {
      colors:{
        primary:'#6C72EF',
        hover:'#ECEFF3',
        base:'#F1F4F8',
        dark:{
          100:'#27292C',
          200:'#202125',
          300:'#15161A',
        },
        formhover:'#e7eff5',
      },
      fontFamily:{
        roboto:['Roboto','sans-serif']
      }
    },
  },
  variants: {
    textColor:['responsive', 'hover', 'focus', 'group-hover'],
  },
  plugins: [],
}
