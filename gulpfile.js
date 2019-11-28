var gulp         = require('gulp');
var sass         = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var combineMq    = require('gulp-combine-mq');
var uglify       = require('gulp-uglify');
var imagemin     = require('gulp-imagemin');
var pngquant     = require('imagemin-pngquant');
var rename       = require('gulp-rename');
var replace      = require('gulp-replace');
var gulpCopy     = require('gulp-copy');
var colorize     = require('gulp-colorize-svgs');

function scss(cb) {
  gulp.src('_scss/app.scss')
    .pipe(sass({
      outputStyle: 'compressed',
      precision: 7
    }).on('error', sass.logError))
    .pipe(combineMq({
      beautify: false
    }))
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(rename('app.min.css'))
    .pipe(gulp.dest('./assets/css'));

  var cbString = new Date().getTime();
  gulp.src(["functions.php"])
    .pipe(
      replace(/\$cache_buster = \S+/g, function() {
        return "$cache_buster = " + cbString + ";";
      })
    )
    .pipe(gulp.dest('.'));

  cb();
}

function js(cb) {
  gulp.src('_js/*.js')
    .pipe(uglify())
    .pipe(rename(function (path) {
      path.extname = '.min.js';
    }))
    .pipe(gulp.dest('./assets/js'));
  cb();
}

function img(cb) {
  gulp.src('_img/*')
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [
        {removeViewBox: false},
        {cleanupIDs: false}
      ],
      use: [pngquant()]
    }))
    .pipe(gulp.dest('./assets/img'));

  gulp.src('_img/icons/*')
    .pipe(colorize({
      colors: {
        default: {
          black: '#000000'
        }
      },
      replaceColor: function(content, hex) {
        return content.replace(/<path/g, '<path fill="#fff"');
      },
      replacePath: function(path, colorKey) {
        return path;
      }
    }))
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [
        {removeViewBox: false},
        {cleanupIDs: false}
      ],
      use: [pngquant()]
    }))
    .pipe(gulp.dest('./assets/img/icons'));

  cb();
}

function watch() {
  gulp.watch('_scss/**/*.scss', scss);
  gulp.watch('_img/**/*', img);
}

exports.default = gulp.series(gulp.parallel(scss, img), watch);
