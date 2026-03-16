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
                primary: {
                    950: '#010f24',
                    900: '#022f6e',
                    800: '#033d8f',
                    700: '#0450b8',
                    600: '#1565d8',
                    500: '#3b82f6',
                    400: '#60a5fa',
                    300: '#93c5fd',
                    200: '#bfdbfe',
                    100: '#dbeafe',
                    50:  '#eff6ff',
                },
                accent: {
                    teal:    '#0ea5e9',
                    cyan:    '#06b6d4',
                    emerald: '#10b981',
                    amber:   '#f59e0b',
                    rose:    '#f43f5e',
                },
                neutral: {
                    900: '#0f172a',
                    800: '#1e293b',
                    700: '#334155',
                    600: '#475569',
                    400: '#94a3b8',
                    200: '#e2e8f0',
                    100: '#f1f5f9',
                    50:  '#f8fafc',
                }
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                display: ['Plus Jakarta Sans', 'sans-serif'],
                body:    ['DM Sans', 'sans-serif'],
            },
            borderRadius: {
                sm:   '8px',
                md:   '12px',
                lg:   '16px',
                xl:   '24px',
                '2xl':'32px',
            },
            boxShadow: {
                primary: '0 4px 16px rgba(2,47,110,0.35)',
                glass:   '0 8px 32px rgba(2,47,110,0.15)',
            }
        },
    },

    plugins: [forms],
};
