import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                primary: '#0054A5',
                secondary: '#FFFEFF',
                'dark-primary': '#C39D78',
                'dark-secondary': '#355955',
            },
            typography: {
                DEFAULT: {
                    css: {
                        'h2:first-child': {
                            marginTop: '0',
                        },
                    },
                },
                'lg': {
                    css: {
                        'h2:first-child': {
                            marginTop: '0',
                        },
                    },
                },
                'xl': {
                    css: {
                        'h2:first-child': {
                            marginTop: '0',
                        },
                    },
                },
            },
        }
    }
}
