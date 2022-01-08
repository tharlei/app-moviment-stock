const section = process.env.npm_config_section

const path = `${__dirname}/resources/${section}/webpack.mix.js`

require(path)
