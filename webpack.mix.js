const section = process.env.npm_config_section

let path = `${__dirname}/resources/web/webpack.mix.js`
if (section === 'admin') {
  path = `${__dirname}/resources/admin/webpack.mix`
}

require(path)
