var gulp = require("gulp");
var minifyCss = require('gulp-minify-css');
var concat = require('gulp-concat');
var autoprefixer = require('gulp-autoprefixer');
// var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
// var minifyHtml = require('gulp-minify-html');
// var rev = require('gulp-rev');
var watch = require('gulp-watch');

var src = {
	css: [ 'assets/css/main.css' ],
	js: [ '!assets/js/jquery.js', '!assets/js/swfobject.js', '!assets/js/dist/*.js', 'assets/js/**/*.js' ]
};

var dest = {
	css: 'assets/css/dist/',
	js: 'assets/js/dist/'
};

gulp.task('build', function() {
	gulp.src(src.css)
		.pipe(watch(src.css))
		.pipe(minifyCss({compatibility: 'ie8', roundingPrecision: -1, keepSpecialComments: 1}))
		.pipe(concat('hello.css'))
		.pipe(gulp.dest(dest.css));

	gulp.src(src.js)
		.pipe(watch(src.js))
		.pipe(uglify({
			output: {
				// max_line_len: 80
			}
		}))
		.pipe(concat('hello.js'))
		.pipe(gulp.dest(dest.js));
});