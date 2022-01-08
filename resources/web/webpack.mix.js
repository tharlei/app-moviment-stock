require('laravel-mix-merge-manifest')
const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

const srcPath = __dirname
const outPath = `public/assets/web`

mix.autoload({})
    .copy(`${srcPath}/images`, `${outPath}/images`)
    .ts(`${srcPath}/ts/app.ts`, `${outPath}/js/app.js`)
    .sass(`${srcPath}/sass/app.scss`, `${outPath}/css/app.css`)
    .options({
        postCss: [tailwindcss(`${srcPath}/tailwind.config.js`)],
    })
    .extract([])
    .vue()
    .mergeManifest()

  if (mix.inProduction()) {
    mix.version()
  }
