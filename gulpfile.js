const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

// SCSS compile task
function styles() {
    return gulp.src('assets/scss/style.scss')   // SCSS source
        .pipe(sass().on('error', sass.logError))  // Compile SCSS
        .pipe(postcss([autoprefixer()]))          // Add prefixes
        .pipe(cleanCSS())                          // Minify CSS
        .pipe(rename({ suffix: '.min' }))         // style.min.css
        .pipe(gulp.dest('assets/css'));           // Output CSS
}

// Watch task
function watchFiles() {
    gulp.watch('assets/scss/**/*.scss', styles);
}

// Default task
exports.default = gulp.series(styles, watchFiles);
