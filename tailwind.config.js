import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

const settings = {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    safelist: [
        {
            pattern: /w-(24|28|32|36|40|44|48|52|56|60|64|72|80|96)/
        }
    ],

    theme: {
        backgroundSize: {
            24: '6rem',
            32: '8rem'
        },
        container: {
            center: true,
            padding: {
                DEFAULT: '0',
                sm: '1rem'
            },
        },
        extend: {
            maxWidth: {
                '1/2': '50%'
            },
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans]
            },
            spacing: {
                4.5: '18px',
                22: '5.5rem',
                88: '22rem',
                128: '32rem',
                144: '36rem'
            },
            minWidth: {
                '96': '24rem'
            },
            width: {
                22: '5.5rem',
                88: '22rem',
                128: '32rem',
                144: '36rem',
                192: '48rem',
                200: '50rem'
            },
            height: {
                22: '5.5rem',
                88: '22rem',
                128: '32rem',
                144: '36rem',
                192: '48rem',
                200: '50rem'
            },
            maxHeight: {
                'modal': '75vh'
            },
            boxShadow: {
                'light-1': '0px 1px 2px rgba(0, 0, 0, 0.3), 0px 1px 3px 1px rgba(0, 0, 0, 0.15)',
                'light-2': '0px 1px 2px rgba(0, 0, 0, 0.3), 0px 2px 6px 2px rgba(0, 0, 0, 0.15)',
                'hard-1': '0 0 30px 40px rgba(88, 84, 168, 0.2)',
                'modal': '0px 0px 4px rgba(0, 0, 0, 0.2), 0px 0px 6px 1px rgba(0, 0, 0, 0.1)'
            },
            opacity: {
                8: '0.08',
                11: '0.11',
                12: '0.12',
                14: '0.14',
                38: '0.38'
            },
            animation: {
                'loading': 'spin 1.6s linear infinite'
            },
            backdropBlur: {
                xs: '2px',
            }
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',

            white: '#ffffff',
            black: '#000000',

            primary: {
                'DEFAULT': '#615daa',
                100: '#ffffff',
                99: '#fffbff',
                98: '#fcf8ff',
                95: '#f3eeff',
                90: '#e3dfff',
                80: '#c4c0ff',
                70: '#a6a1fc',
                60: '#8b87df',
                50: '#716dc3',
                40: '#5854a8',
                35: '#4c489b',
                30: '#403b8e',
                25: '#352f82',
                20: '#292377',
                10: '#130463',
                0: '#000000',
            },

            secondary: {
                'DEFAULT': '#aa875d',
                100: '#ffffff',
                99: '#fffbff',
                98: '#fff8f4',
                95: '#ffeede',
                90: '#ffddb7',
                80: '#ffb95d',
                70: '#e49c36',
                60: '#c6821c',
                50: '#a66a00',
                40: '#855400',
                35: '#754900',
                30: '#653e00',
                25: '#553400',
                20: '#462a00',
                10: '#2a1700',
                0: '#000000',
            },

            tertiary: {
                'DEFAULT': '#568331',
                100: '#ffffff',
                99: '#f8ffeb',
                98: '#efffdb',
                95: '#d0ffa6',
                90: '#bef291',
                80: '#a2d578',
                70: '#88b960',
                60: '#6f9e48',
                50: '#568331',
                40: '#3e691a',
                35: '#325d0d',
                30: '#275000',
                25: '#204400',
                20: '#193800',
                10: '#0c2000',
                0: '#000000',
            },

            error: {
                'DEFAULT': '#ba1a1a',
                100: '#ffffff',
                99: '#fffbff',
                98: '#fff8f7',
                95: '#ffedea',
                90: '#ffdad6',
                80: '#ffb4ab',
                70: '#ff897d',
                60: '#ff5449',
                50: '#de3730',
                40: '#ba1a1a',
                35: '#a80710',
                30: '#93000a',
                25: '#7e0007',
                20: '#690005',
                10: '#410002',
                0: '#000000'
            },

            neutral: {
                'DEFAULT': '#5d5e61',
                100: '#ffffff',
                99: '#fdfcff',
                98: '#faf9fd',
                95: '#f1f0f4',
                90: '#e3e2e6',
                80: '#c6c6ca',
                70: '#ababae',
                60: '#909094',
                50: '#76777a',
                40: '#5d5e61',
                35: '#515255',
                30: '#45474a',
                25: '#3a3b3e',
                20: '#2f3033',
                10: '#1a1c1e',
                0: '#000000'
            },

            'neutral-variant': {
                'DEFAULT': '#5a5f66',
                100: '#ffffff',
                99: '#fdfcff',
                98: '#f8f9ff',
                95: '#edf1fa',
                90: '#dfe2eb',
                80: '#c3c6cf',
                70: '#a7abb4',
                60: '#8d9199',
                50: '#73777f',
                40: '#5a5f66',
                35: '#4e535a',
                30: '#43474e',
                25: '#373c43',
                20: '#2c3137',
                10: '#181c22',
                0: '#000000'
            },

            light: {
                'primary': '',
                'on-primary': '',
                'primary-container': '',
                'on-primary-container': '',

                'secondary': '',
                'on-secondary': '',
                'secondary-container': '',
                'on-secondary-container': '',

                'tertiary': '',
                'on-tertiary': '',
                'tertiary-container': '',
                'on-tertiary-container': '',

                'error': '#ba1a1a',
                'on-error': '#ffffff',
                'error-container': '#ffdad6',
                'on-error-container': '#410002',

                'background': '#fdfcff',
                'on-background': '#1a1c1e',

                'surface': '#fdfcff',
                'surface-variant': '#dfe2eb',
                'surface-container': '#eceeef',
                'on-surface': '#1a1c1e',
                'on-surface-variant': '#43474e',

                'inverse-primary': '#a1c9ff',
                'inverse-surface': '#2f3033',
                'inverse-on-surface': '#f1f0f4',

                'outline': '#73777f',
                'outline-variant': '#c3c6cf'
            },

            dark: {
                'primary': '#a1c9ff',
                'on-primary': '#00325a',
                'primary-container': '#00487f',
                'on-primary-container': '#d2e4ff',

                'secondary': '#bbc7db',
                'on-secondary': '#253141',
                'secondary-container': '#3c4858',
                'on-secondary-container': '#d7e3f8',

                'tertiary': '#d8bde4',
                'on-tertiary': '#3c2947',
                'tertiary-container': '#533f5f',
                'on-tertiary-container': '#f4d9ff',

                'error': '#ffb4ab',
                'on-error': '#690005',
                'error-container': '#93000a',
                'on-error-container': '#ffdad6',

                'background': '#1a1c1e',
                'on-background': '#e3e2e6',

                'surface': '#1a1c1e',
                'surface-variant': '#43474e',
                'surface-container': '#1d2021',
                'on-surface': '#e3e2e6',
                'on-surface-variant': '#c3c6cf',

                'inverse-primary': '#0f61a4',
                'inverse-surface': '#e3e2e6',
                'inverse-on-surface': '#1a1c1e',

                'outline': '#8d9199',
                'outline-variant': '#43474e'
            }
        }
    },

    plugins: [
        forms,
        typography
    ],
}
const colors = settings.theme.colors;

['primary', 'secondary', 'tertiary'].forEach(function (name) {
    colors.light[name] = colors[name].DEFAULT;
    colors.light['on-' + name] = colors[name][100];
    colors.light[name + '-container'] = colors[name][90];
    colors.light['on-' + name + '-container'] = colors[name][10];
})


export default settings;
