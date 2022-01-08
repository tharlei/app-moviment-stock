module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false,
    theme: {
        fontFamily: {
            sans: ['Poppins', 'sans-serif'],
        },
        extend: {
            colors: {
                gray: "#424D60",
                blue: "#07A1CB",
                purple: "#BC95FB",
                white: "#FAFAFA",
                brown: "#A68366"
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
