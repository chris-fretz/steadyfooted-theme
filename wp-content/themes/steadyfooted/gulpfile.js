// Define dependencies
const { src, dest, watch, series } = require('gulp'); // Gulp
const terser = require('gulp-terser'); // minifies JS
const rename = require('gulp-rename'); // adds ability to rename file (for adding .min suffix)

// Minify JS
function minifyJS() {
    return src('assets/src/js/*js')
        .pipe(terser())
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('assets/dist/js'))
}

// Start watch task
function watchTask() {
    watch('assets/src/js/*.js', minifyJS);
}

// Default Gulp Task
exports.default = series(
    minifyJS,
    watchTask
);