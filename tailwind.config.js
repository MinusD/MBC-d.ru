const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    // mode: 'jit',
    presets: [
        require('./vendor/ph7jack/wireui/tailwind.config.js'),
    ],

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/ph7jack/wireui/resources/**/*.blade.php',
        './vendor/ph7jack/wireui/ts/**/*.ts',
        './vendor/ph7jack/wireui/src/View/**/*.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        // colors: {
        //     transparent: 'transparent',
        //     current: 'currentColor',
        //
        //     black: colors.black,
        //     white: colors.white,
        //     red: colors.red,
        //     gray: colors.gray,
        //     blueGray: colors.sky,
        //     coolGray: colors.gray,
        //     trueGray: colors.neutral,
        //     orange: colors.orange, // 橙色
        //     amber: colors.amber, // 琥珀黄色
        //     yellow: colors.yellow,
        //     green: colors.green,
        //     cyan: colors.cyan, // 青色
        //     lightBlue: colors.sky, // 淡青，亮蓝
        //     blue: colors.blue,
        //     indigo: colors.indigo, // 蓝紫
        //     violet: colors.violet, // 粉紫
        //     purple: colors.purple,
        //     pink: colors.pink,
        //     rose: colors.rose, // 粉红色
        //     baseColor: '#55CCC1',
        //     fromBase: '#A6F9D9',
        //     baseGreen: '#EEFAF9',
        //     baseOrange: '#FF9001',
        //     baseGray: '#999',
        //     baseRed: '#FF5050',
        //     baseBlue: '#3E87FF',
        //     basePlaceholder: '#ccc',
        //     baseBg: '#F5F5F5',
        //     base2: '#222',
        //     base3: '#333',
        //     base6: '#666',
        //     base7: '#777'
        // },


    },
    darkMode: 'class',
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
