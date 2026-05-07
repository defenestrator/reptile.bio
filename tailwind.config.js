import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './resources/views/**/*.blade.php',
        './app/**/*.php',
    ],

    theme: {
        extend: {
            colors: {
                brand: {
                    '50':  '#eff6ff',
                    '100': '#dbeafe',
                    '200': '#bfdbfe',
                    '300': '#93c5fd',
                    '400': '#60a5fa',
                    '500': '#3b82f6',
                    '600': '#2563eb',
                    '700': '#1d4ed8',
                    '800': '#1e40af',
                    '900': '#1e3a8a',
                },
                accent: {
                    '50':  '#fffbeb',
                    '100': '#fef3c7',
                    '200': '#fde68a',
                    '300': '#fcd34d',
                    '400': '#fbbf24',
                    '500': '#f59e0b',
                    '600': '#d97706',
                    '700': '#b45309',
                    '800': '#92400e',
                    '900': '#78350f',
                },
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                serif: ['"Merriweather"', ...defaultTheme.fontFamily.serif],
            },
        },
    },

    plugins: [forms, typography],
};
