module.exports = {
  purge: {
    enabled: process.env.NODE_ENV === 'production',
    content: [
      './resources/views/browser/**/*.blade.php',
      './resources/views/admin/**/*.blade.php',
      './resources/views/livewire/**/*.blade.php',
      './resources/views/errors/*.blade.php',
      './resources/sass/**/*.scss',
      './resources/js/**/*.js',
    ],
  },
  theme: {
    extend: {
      colors:{
        primary:'#6C72EF',
        hover:'#ECEFF3',
        base:'#fcfdff',
        dark:{
          100:'#27292C',
          200:'#202125',
          300:'#15161A',
        },
        formhover:'#e7eff5',
        
      },
      fontFamily:{
        roboto:['Roboto','sans-serif']
      },
    },
  },
  variants: {
    textColor:['responsive', 'hover', 'focus', 'group-hover'],
  },
  plugins: [],
}
