var gulp = require("gulp");
var minifyCss = require('gulp-minify-css');
var concat = require('gulp-concat');
var autoprefixer = require('gulp-autoprefixer');
// var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var gutil = require('gulp-util');
// var minifyHtml = require('gulp-minify-html');
// var rev = require('gulp-rev');
// var watch = require('gulp-watch');

var src = {
	css: [ 'assets/css/main.css' ],
	mobile: [ 'assets/css/mobile.css' ],
	desktop: [ 'assets/css/desktop.css' ],
	js: [ '!assets/js/jquery.js', '!assets/js/swfobject.js', '!assets/js/dist/*.js', 'assets/js/**/*.js' ]
};

var dest = {
	css: 'assets/css/dist/',
	js: 'assets/js/dist/'
};

gulp.task('build', function() {
	gulp.src(src.css)
		.pipe(minifyCss({compatibility: 'ie8', roundingPrecision: -1, keepSpecialComments: 1}))
		.pipe(concat('hello.css'))
		.pipe(gulp.dest(dest.css));

	gulp.src(src.mobile)
		.pipe(minifyCss({compatibility: 'ie8', roundingPrecision: -1, keepSpecialComments: 1}))
		.pipe(concat('mobile.css'))
		.pipe(gulp.dest(dest.css));

	gulp.src(src.desktop)
		.pipe(minifyCss({compatibility: 'ie8', roundingPrecision: -1, keepSpecialComments: 1}))
		.pipe(concat('desktop.css'))
		.pipe(gulp.dest(dest.css));

	gulp.src(src.js)
		.pipe(uglify().on('error', gutil.log))
		.pipe(concat('hello.js'))
		.pipe(gulp.dest(dest.js));
});