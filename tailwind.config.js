/** @type {import('tailwindcss').Config} */
module.exports = {
    // content: ["./resources/views/layout/app.blade.php"],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
