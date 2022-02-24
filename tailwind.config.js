module.exports = {
    purge: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
    darkMode: "class", // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                "ocean-primary": "#1da2d8", //jarang dipake
                "ocean-secondary": "#76b6c4", //
                "ocean-light": "#669BBC", //background
                "ocean-dark": "#003049", //background dark
                "secondary-red": "#FF9233", //button - icon
                "secondary-red-hover": "#CC5F00", //button -icon hover
                "ocean-white": "#F4F4F6", // huruf landing page
                "button-light": "#F8CF77", //button light
                "button-dark": "#E9A30C", // button dark
            },
            minHeight: {
                0: "0",
                "1/4": "25%",
                "1/2": "50%",
                "3/4": "75%",
                full: "100%",
            },
        },
    },ants: {
       extend: {},
     },
     plugins: [],
   }
