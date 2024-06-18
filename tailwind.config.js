import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */

export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/views/**/*.vue',
        './resources/js/**/*.js',
        './app/Http/Livewire/**/*.php',
        './resources/views/livewire/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                electrique: '#F8D030',
                eau: '#6890F0',
                fee: '#EE99AC',
                feu: '#F08030',
                glace: '#98D8D8',
                pierre: '#B8A038',
                plante: '#78C850',
                psy: '#F85888',
                robot: '#A8A8A8',
                sol: '#E0C068',
                tenebre: '#7B68EE',
            },
        
        },
    },

    plugins: [forms],
    
    
};
