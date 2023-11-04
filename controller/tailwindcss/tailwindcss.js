tailwind.config = {
  theme: {
    extend: {
      colors: {
        clifford: "#da373d",
      },
    },
    plugins: [require("@tailwindcss/aspect-ratio"), require('@tailwindcss/forms')],
  },
};
