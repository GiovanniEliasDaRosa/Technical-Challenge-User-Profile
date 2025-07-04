const mix = require("laravel-mix");

mix.options({
  hmrOptions: {
    host: "127.0.0.1",
    port: 5173,
  },
});

mix
  .js("resources/js/app.js", "public/resources/js")
  .css("resources/css/app.css", "public/resources/css");
