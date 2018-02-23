const path = require('path')
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

module.exports = {
  entry: ['./js/app.js'],

  output: {
    filename: 'js/bundle.js',
    path: path.resolve(__dirname, 'dist')
  }
}
