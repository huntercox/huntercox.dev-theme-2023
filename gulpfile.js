const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const npmDist = require('gulp-npm-dist');
const rename = require('gulp-rename');
const browserSync = require('browser-sync').create();


function tinymceStyles() {
	// admin-style.css
	return gulp.src('assets/src/scss/wp/tinymce.scss')
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(sourcemaps.write())
		.pipe(cleanCSS({ compatibility: 'ie8' }))
		.pipe(gulp.dest('./assets/dist/css/'))
}

function editorStyles() {
	// editor-style.css
	return gulp.src('assets/src/scss/wp/editor-style.scss')
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./')) // has to be in the theme's root directory
}

function minify() {
	// 1. locate source SCSS files
	return gulp.src('./style.css')
		// 2. pass file to Sass Compiler
		.pipe(cleanCSS({ compatibility: 'ie8' }))
		// 3. locate destination for compiled CSS
		.pipe(gulp.dest('./'))
}

// compile scss to css
function styles() {
	// 1. locate source SCSS files
	return gulp.src('assets/src/scss/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./'))
		// 4. stream changes to all browsers
		.pipe(browserSync.stream())
}

function copyDeps() {
	return gulp.src(npmDist(), { base: 'node_modules/' })
		.pipe(gulp.dest('assets/dist/vendor'))
}

function watch() {
	browserSync.init({
		notify: false,
		open: true,
		ui: false,
		proxy: 'huntercoxdev.local',
		watchOptions: {
			debounceDelay: 1000
		}
	});
	gulp.watch(['assets/src/scss/**/*.scss', '!assets/src/scss/wp/**/*.scss'], styles);
	// gulp.watch('assets/src/scss/wp/**/*.scss', tinymceStyles);
	// gulp.watch('assets/src/scss/wp/**/*.scss', editorStyles);

	gulp.watch('./assets/src/scss/**/*.scss').on('change', browserSync.reload);
	gulp.watch('./assets/src/js/**/*.js').on('change', browserSync.reload);
	gulp.watch('**/*.php').on('change', browserSync.reload);
}

exports.tinymceStyles = tinymceStyles;
exports.editorStyles = editorStyles;
exports.styles = styles;
exports.watch = watch;

exports.copyDeps = copyDeps;
exports.minify = minify;