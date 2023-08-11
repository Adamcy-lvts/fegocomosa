const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'class',
    presets: [
        
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    content: [
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
       
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: [ 'Roboto','Montserrat', 'Nunito', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif', ...defaultTheme.fontFamily.sans],
            },
        },

       
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
