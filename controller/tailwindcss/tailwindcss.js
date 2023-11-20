tailwind.config = {
  theme: {
    extend: {
      gridTemplateRows: {
        '[auto,auto,1fr]': 'auto auto 1fr',
      },
      colors: {
        clifford: "#da373d",
      },
    },
    plugins: [
      require("@tailwindcss/aspect-ratio"), 
      require('@tailwindcss/forms'),
    ]
  },
};
