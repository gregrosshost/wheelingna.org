import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: '#355955',
                secondary: '#C39D78',
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
