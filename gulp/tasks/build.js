var gulp = require("gulp");
var minifyCss = require('gulp-minify-css');
var sourcemaps = require('gulp-sourcemaps');
// var uglify = require('gulp-uglify');
// var minifyHtml = require('gulp-minify-html');
// var minifyCss = require('gulp-minify-css');
// var rev = require('gulp-rev');

var src = "./assets/css/";
var dest = src + "dist/";

gulp.task('build', function() {
	return gulp.src(src + '*.css')
		.pipe(minifyCss({compatibility: 'ie8'}))
		.pipe(gulp.dest(dest));
});