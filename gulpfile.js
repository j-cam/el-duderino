// Requiring Gulp
var gulp = require('gulp');
var size = require('gulp-size');
var gutil = require('gulp-util');
var runSequence = require('run-sequence');
var browserSync = require('browser-sync');

/*
  STYLES
 */
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var cssnano = require('gulp-cssnano');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var gulpautoprefixer = require('gulp-autoprefixer');
var groupmq = require('gulp-group-css-media-queries');
var reporter = require('postcss-reporter');

/*
  SCRIPTS
 */
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var include = require("gulp-include");



gulp.task('browserSync', function () {
    browserSync({
        proxy: "wpsandbox.local:8888/",
        open: true
      });
});

// Task: Handle Sass and CSS
gulp.task('styles', function() {


    return gulp.src( '_src/scss/style.scss' )
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError)) // Passes it through a gulp-sass task
        .pipe(gulpautoprefixer(
          {
          browsers: ['last 2 versions'],
          cascade: false,
          add: true,
          remove: true,
        }))
        .pipe(sourcemaps.write('./.maps'))
        .pipe( gulp.dest('./').on('error', gutil.log))
        .pipe(size({ title: 'style.css size', showFiles: true }))
        .pipe(browserSync.stream({match: '**/*.css'}));

});

gulp.task('styles:prod', function() {

  return gulp.src(
          '_src/scss/style.scss'
      )
      .pipe(sourcemaps.init())
      .pipe(sass().on('error', sass.logError))
      .pipe(sass({
          outputStyle: 'expanded'}
      ).on('error', sass.logError))
      .pipe(
          postcss([
              autoprefixer({
                    browsers: ['last 2 versions'],
                    cascade: false,
                    add: true,
                    remove: true,
                  }),
              reporter(),
          ])
      )
      .pipe( groupmq() )
      .pipe(cssnano({
          safe: true,
          discardComments: { removeAllButFirst: false },
          discardDuplicates: true,

      })).on('error', gutil.log)
      .pipe( sourcemaps.write('./'))
      .pipe( gulp.dest('./'))
      .pipe(size({ title: 'SIZE -> CSS', showFiles: true }))
      .pipe(browserSync.stream({match: '**/*.css'}));
});


gulp.task('scripts', function () {

    return gulp.src('_src/js/main.js')
    .pipe(include())
    .pipe(rename("main.min.js"))
    .pipe(sourcemaps.init())
    .pipe(uglify().on('error', gutil.log))
    // .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('/js/'))
    .pipe(size({ title: 'JS Scripts', showFiles: true }))
    .pipe(browserSync.stream({match: './assets/**/*.js'}));
});


gulp.task('watch', ['browserSync', 'styles', 'scripts'], function() {

  gulp.watch('_src/scss/**/*.scss', ['styles:prod']);


  gulp.watch('_src/js/**/*.js', ['scripts']);
  gulp.watch('**/*.php', browserSync.reload);

});

gulp.task('default', ['watch']);