/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./app/views/**/*.{html,js,php}",
        "./app/views/**/**/*.{html,js,php}",
        "./app/views/**/**/**/*.{html,js,php}",
        "./app/controllers/**/*.{html,js,php}",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
