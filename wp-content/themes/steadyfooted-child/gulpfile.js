// Define dependencies
const { src, dest, watch, series } = require('gulp'); // Gulp
const sass = require('gulp-sass')(require('sass')); // Compiles SCSS to CSS
const postCSS = require('gulp-postcss');
const prefixer = require('autoprefixer'); // Adds support for previous versions (of what?)
const cleanCSS = require('gulp-clean-css'); // minifies CSS
const terser = require('gulp-terser'); // minifies JS
const rename = require('gulp-rename'); // adds ability to rename file (for adding .min suffix)

// Compile SASS to CSS and minify it
function minifyCSS() {
    return src([
        'assets/src/sass/style.scss',
        'assets/src/sass/mce-style.scss',
        'assets/src/sass/editor-style.scss'
    ])
        .pipe(sass().on('error', sass.logError))
        .pipe(postCSS([
            prefixer({
                overrideBrowserslist: ["last 3 versions"],
                cascade: false
            })
        ]))
        .pipe(cleanCSS())
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('assets/dist/css'))
}

// Minify JS
function minifyJS() {
    return src('assets/src/js/*js')
        .pipe(terser())
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('assets/dist/js'))
}

// Start watch task
function watchTask() {
    watch('assets/src/sass/*.scss', minifyCSS);
    watch('assets/src/js/*.js', minifyJS);
}

// Default Gulp Task
exports.default = series(
    minifyCSS,
    minifyJS,
    watchTask
);