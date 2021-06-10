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
    .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(concat('global.css'))
    .pipe(dest('dist/css'));
}

// Lint Theme styles
function lintSassWatch() {
  return src('assets/scss/**/*.scss')
    .pipe(gulpStylelint({
      reporters: [
        {formatter: 'string', console: true}
      ]
    }));
}

// Watch Theme style
function watchStyles(done) {
  watch('assets/scss/**/*.scss', series(themeStyles, lintSassWatch)),
  done();
}

function lintJavascript() {
   return src('assets/js/**/*.js')
     .pipe(eslint())
     .pipe(eslint.format())
     // To have the process exit with an error code (1) on
     // lint error, return the stream and pipe to failAfterError last.
     //.pipe(eslint.failAfterError());
}

// Bundle the js added in the theme.
function themeConcatJs() {
  return src('assets/js/**/*.js')
    .pipe(concat('scripts.js'))
    .pipe(dest('dist/js'));
}

// watch the theme scritps while linting
function watchJavascript(done) {
  watch('assets/js/*.js', series(themeConcatJs, lintJavascript));
  done();
}

exports.default = defaultTask


exports.build = series(
  themeStyles,
  themeConcatJs
);

exports.production = series(
  themeStyles,
  themeConcatJs
);

exports.watch = series(
  watchStyles,
  watchJavascript
);
