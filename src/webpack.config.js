module.exports = {
  module: {
    loaders: [
      {
        test: /\.json$/,
        loader: 'json-loader'
      },
      {
        test: /\.s[a|c]ss$/,
        loader: 'style!css!sass'
      }
    ]
  },
  vue: {
    loaders: {
      scss: 'style!css!sass'
    }
  }
}