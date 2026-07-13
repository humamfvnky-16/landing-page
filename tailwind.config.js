import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            height: {
                400: '400px',
                500: '500px',
            },
        },
    },
    safelist: [
      {
        pattern: /grid-cols-(1|2|3|4|5|6|7|8|9|10|11|12)/,
        variants: ['sm', 'md', 'lg', 'xl'],
      },
      {
        pattern: /col-span-(1|2|3|4|5|6|7|8|9|10|11|12)/,
        variants: ['sm', 'md', 'lg', 'xl'],
      },
    ],

    plugins: [forms, typography],
};
