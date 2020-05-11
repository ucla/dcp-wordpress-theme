'use strict';

const { src, series, dest, parallel, watch, task } = require('gulp');
const cleanCSS = require('gulp-clean-css');
const sass = require('gulp-sass');
const gulpStylelint = require('gulp-stylelint');
const concat = require('gulp-concat');
const eslint = require('gulp-eslint');

sass.compiler = require('node-sass');

// For debugging, make sure gulp is installed
function defaultTask(cb) {
  cb();
}
// Compile the theme styles
function themeStyles() {
  return src('assets/scss/**/*.scss')
    .pipe(sass.sync({outputStyle: 'expanded'}).on('error', sass.logError))
    .pipe(dest('dist/css'));
}

// watch styles
function lintSassWatch() {
  return src('assets/scss/**/*.scss')
    .pipe(gulpStylelint({
      reporters: [
        {formatter: 'string', console: true}
      ]
    }));
}

function watchStyles(done) {
  watch('assets/scss/**/*.scss', series(themeStyles, lintSassWatch)),
  done();
}

//get the styles from the components library and add them to the theme.
function libraryStyles() {
  return src('./node_modules/ucla-bruin-components/public/css/global.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(dest('dist/css/ucla-components-library'));
}

function lintJavascript() {
   return src('assets/js/**/*.js')
     .pipe(eslint())
     .pipe(eslint.format())
     // To have the process exit with an error code (1) on
     // lint error, return the stream and pipe to failAfterError last.
     //.pipe(eslint.failAfterError());
}


// install bruin component library JS
function libraryConcatJs() {
  return src('./node_modules/ucla-bruin-components/public/js/scripts.js')
    .pipe(concat('scripts.js'))
    .pipe(dest('dist/js/ucla-components-library'));
}

// Bundle the js added in the theme.
function themeConcatJs() {
  return src('assets/js/scripts.js')
    .pipe(concat('scripts.js'))
    .pipe(dest('dist/js'));
}

// watch the theme scritps while linting
function watchJavascript(done) {
watch('assets/js/*.js', series(lintJavascript));
done();
}



exports.default = defaultTask

exports.production = series(
  libraryStyles,
  themeStyles,
  themeConcatJs,
  libraryConcatJs
);

exports.watch = series(
  watchStyles,
  watchJavascript
);
