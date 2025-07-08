const mix = require("laravel-mix");

mix.options({
  hmrOptions: {
    host: "127.0.0.1",
    port: 5173,
  },
});

mix
  .scripts(
    ["resources/js/functions.js", "resources/js/main.js"],
    "public/resources/js/main.js"
  )
  .js("resources/js/auth.js", "public/resources/js/auth.js");

mix
  .styles(
    [
      "resources/css/icons.css",
      "resources/css/style.css",
      "resources/css/header.css",
      "resources/css/popup.css",
    ],
    "public/resources/css/global.css"
  )
  .css("resources/css/auth.css", "public/resources/css/auth.css")
  .css("resources/css/listusers.css", "public/resources/css/listusers.css")
  .css("resources/css/home.css", "public/resources/css/home.css");
