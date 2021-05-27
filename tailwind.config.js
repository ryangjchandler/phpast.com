module.exports = {
    purge: {
        content: [
            './resources/views/**/*.blade.php'
        ],
        options: {
            safelist: ['text-red-600', 'text-xs', 'font-medium', 'font-mono']
        }
    },
    darkMode: false,
    theme: {
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
