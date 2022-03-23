'use strict';

const {
  src,
  dest,
  watch,
  series
} = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const del = require('del');
const eslint = require('gulp-eslint');
const gulpStylelint = require('gulp-stylelint');
const minify = require('gulp-minify');
const sourcemaps = require('gulp-sourcemaps');

// For debugging, make sure gulp is installed
function defaultTask(cb) {
  cb();
}

// Compile the theme styles
function themeStyles() {
  return src('assets/scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass.sync({
      outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(concat('global.css'))
    .pipe(sourcemaps.write(''))
    .pipe(dest('dist/css'));
}

function compressThemeStyles() {
  return src('assets/scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass.sync({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(concat('global.min.css'))
    .pipe(sourcemaps.write(''))
    .pipe(dest('dist/css'));
}

// Lint Theme styles
function lintSass() {
  return src('assets/scss/**/*.scss')
    .pipe(gulpStylelint({
      reporters: [{
        formatter: 'string',
        console: true
      }]
    }));
}

// Watch Theme style
function watchStyles(done) {
  watch('assets/scss/**/*.scss',
    series(themeStyles, lintSass)),
  done();
}

function lintJs() {
  return src('assets/js/**/*.js')
    .pipe(eslint())
    .pipe(eslint.format());
}

// Bundle the js added in the theme.
function themeJs() {
  return src('assets/js/**/*.js')
    .pipe(sourcemaps.init())
    .pipe(concat('scripts.js'))
    .pipe(minify({
      ext: {
        src: '.js',
        min: '.min.js'
      },
    }))
    .pipe(sourcemaps.write(''))
    .pipe(dest('dist/js'));
}

// watch the theme scritps while linting
function watchJs(done) {
  watch('assets/js/*.js',
    series(themeJs, lintJs));
  done();
}

function cleanJsStyles() {
  return del([
    'dist/js/*',
    'dist/css/*'
  ]);
}

exports.default = defaultTask;


exports.build = series(
  cleanJsStyles,
  compressThemeStyles,
  themeStyles,
  themeJs
);

exports.production = series(
  cleanJsStyles,
  themeStyles,
  compressThemeStyles,
  themeJs
);

exports.watch = series(
  watchStyles,
  watchJs
);