/** @type {import('tailwindcss').Config} */
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        colors: {
            green: "#0FBA68;",
            white: "#ffffff",
            blue: "#2029F3",
            yellow: "#EAD621",
            dark: "#010414",
            gray: "#808189",
            "error-red": "#CC1E1E",
            "light-gray": "#F6F6F7",
            borderCl: "#E6E6E7",
        },
        screens: {
            xs: "400px",
            sm: "730px",
            md: "960px",
            lg: "1440px",
        },
        extend: {
            opacity: {
                "08": ".08",
            },
        },
        borderWidth: {
            DEFAULT: "1px",
            0: "0",
            2: "2px",
            3: "3px",
            4: "4px",
            6: "6px",
            8: "8px",
        },
    },

    plugins: [require("tailwind-scrollbar")({ nocompatible: true })],
};
