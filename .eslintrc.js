module.exports = {
  rules: {
    "semi": [2, "never"],
    "no-var": 2,
    "indent": [2, 2],
    "comma-spacing": 2,
    "no-unneeded-ternary": 2,
    "no-multi-spaces": 2,
  },
  parserOptions: {
    "ecmaVersion": 2017,
    "parser": "babel-eslint",
    "sourceType": "module",
  },
  extends: ["plugin:vue/base"],
};
