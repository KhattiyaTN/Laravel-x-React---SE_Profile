import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/**ช @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            primary: {
                light: '#821131',
                DEFAULT: '#821131',
                dark: '#821131',
            },
            secondary: {
                light: '#FBA01D',
                DEFAULT: '#FBA01D',
                dark: '#FBA01D',
            },
            card: {
                light: '#D9D9D9',
                DEFAULT: '#D9D9D9',
                dark: '#D9D9D9',
            },
            hover: {
                light: '#808080',
                DEFAULT: '#808080',
                dark: '#808080',
            },
            /* ========================
                        text 
            =========================*/
            headerText: {
                light: '#B8B20A',
                DEFAULT: '#B8B20A',
                dark: '#B8B20A',
            },
            bodyText: {
                light: '#FFFFFF',
                DEFAULT: '#FFFFFF',
                dark: '#FFFFFF',
            },
            /* ========================
                        Button 
            =========================*/
            primaryButton: {
                light: '#821131',
                DEFAULT: '#821131',
                dark: '#821131',
            },
            secondaryButton: {
                light: '#118267',
                DEFAULT: '#118267',
                dark: '#118267',
            },
            infoButton: {
                light: '#53A9F7',
                DEFAULT: '#53A9F7',
                dark: '#53A9F7',
            },
            warningButton: {
                light: '#F4C312',
                DEFAULT: '#F4C312',
                dark: '#F4C312',
            },
            dangerButton: {
                light: '#FF0F00',
                DEFAULT: '#FF0F00',
                dark: '#FF0F00',
            },
        },
    },

    plugins: [forms],
};
