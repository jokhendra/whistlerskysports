/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        // Primary colors
        primary: {
          DEFAULT: '#0F1B2A', // Dark blue
          light: '#12161c',   // Lighter dark blue
          dark: '#0A1220',    // Darker blue
        },
        // Accent colors
        accent: {
          DEFAULT: '#FED600', // Yellow
          hover: '#b78b4d',   // Darker yellow for hover
          dark: '#c05300',    // Dark orange
        },
        // Text colors
        text: {
          DEFAULT: '#0F1B2A', // Dark blue
          light: '#12161c',   // Lighter dark blue
          white: '#ffffff',   // White
          gray: {
            200: '#e5e7eb',   // Light gray
            300: '#d1d5db',   // Medium gray
            400: '#9ca3af',   // Dark gray
            500: '#6b7280',   // Darker gray
            700: '#374151',   // Very dark gray
          }
        },
        // Background colors
        bg: {
          DEFAULT: '#ffffff', // White
          dark: '#0F1B2A',    // Dark blue
          light: '#f3f4f6',   // Light gray
        }
      },
      boxShadow: {
        'lg': '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
        'xl': '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
      },
      scale: {
        '102': '1.02',
      },
    },
  },
  plugins: [],
} 