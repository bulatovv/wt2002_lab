const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin')

module.exports = {
    entry: './src/index.js',
    module: {
        rules: [
            {
                test: /\.(scss)$/,
                use: [
                    {loader: 'style-loader'}, 
                    {loader: 'css-loader'}, 
                    {loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                plugins: function () {
                                    return [require('autoprefixer')];
                                }
                            }
                        }
                    }, 
                    {loader: 'sass-loader'}
                ]
            }
        ]
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'bundle.js'
    },
    plugins: [
        new HtmlWebpackPlugin(
            {template: 'src/index.html'}
        )
    ]
}
