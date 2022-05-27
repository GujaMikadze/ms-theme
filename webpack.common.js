const path = require("path");
var HtmlWebpackPlugin = require("html-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");

module.exports = {
  entry: {
    main: "./src/index.js",
    admin: "./src/admin.js",
    vendor: "./src/vendor.js",
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "[name].css",
    }),
    new CleanWebpackPlugin(),
  ],
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
      },
    ],
  },
  devServer: {
    static: {
      watch: true,

      directory: path.resolve(__dirname, "src"),
    },
    port: 8080,
    allowedHosts: "all",
    open: ["/wp-webpack/"],
    devMiddleware: {
      writeToDisk: true,
    },
  },
};
