import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                goldman: ['"Goldman"', "sans-serif"],
                orbitron: ['"Orbitron"', "sans-serif"],
            },
            keyframes: {
                "pulse-fade": {
                    "0%, 100%": {
                        opacity: "0.2",
                        transform: "scale(0.95)",
                    },
                    "50%": {
                        opacity: "1",
                        transform: "scale(1)",
                    },
                },
            },
            animation: {
                "pulse-fade": "pulse-fade 1.5s ease-in-out infinite",
                "pulse-fade-delay-1":
                    "pulse-fade 1.5s ease-in-out 0.5s infinite",
                "pulse-fade-delay-2": "pulse-fade 1.5s ease-in-out 1s infinite",
            },
        },
    },

    plugins: [forms, typography, require("tailwindcss-animated")],
};
