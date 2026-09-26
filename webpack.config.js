const path = require( 'path' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const CssMinimizerPlugin = require( 'css-minimizer-webpack-plugin' );

module.exports = ( env, argv ) => {
	const isProduction = argv.mode === 'production';

	return {
		// Sass entry point — webpack follows every @import from here,
		// same as grunt-contrib-sass compiling scss/style.scss.
		entry: './scss/style.scss',

		watchOptions: {
			ignored: /node_modules/,
		},

		output: {
			path: path.resolve( __dirname ),
			// Webpack always wants a JS output target even for a CSS-only
			// build. This file is a harmless byproduct — nothing enqueues
			// or references it. Safe to .gitignore or delete after build.
			filename: 'compiled/js/webpack-artifact.js',
		},

		module: {
			rules: [
				{
					test: /\.scss$/,
					use: [
						MiniCssExtractPlugin.loader,
						{
							loader: 'css-loader',
							options: {
								// Grunt/node-sass never validated url() paths —
								// it passed them through as literal text. Some
								// @font-face paths in scss/partials/_fonts.scss
								// are pre-existing broken paths (see migration
								// notes). Disabling URL resolution keeps this
								// migration 1:1 instead of hard-failing the
								// build on unrelated bugs.
								url: false,
							},
						},
						'postcss-loader', // Autoprefixer — see postcss.config.js
						'sass-loader',
					],
				},
			],
		},

		plugins: [
			new MiniCssExtractPlugin( {
				// Compiles straight to the theme root, which is what
				// get_stylesheet_uri() actually serves to WordPress.
				// The theme header comment uses /*! so it survives
				// minification in production builds.
				filename: 'style.css',
			} ),
		],

		optimization: {
			minimize: isProduction,
			minimizer: [ new CssMinimizerPlugin() ],
		},

		// Keep source maps in both modes — the original build shipped
		// style.css.map at the theme root.
		devtool: 'source-map',

		mode: isProduction ? 'production' : 'development',
	};
};
