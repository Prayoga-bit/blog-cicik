import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                brand: {
                    dark: '#1a1a1a',
                    green: '#20544a',
                    yellow: '#ebf16b',
                    light: '#fef9ef',
                    gray: '#4a5565',
                    muted: '#6a7282',
                }
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                cursive: ['Italianno', 'cursive'],
            },
        },
    },

    plugins: [forms],
};
