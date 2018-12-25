const gulp = require('gulp');
const concat = require('gulp-concat');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const del = require('del');
const browserSync = require('browser-sync').create();
const sourcemaps = require('gulp-sourcemaps');
const gcmq = require('gulp-group-css-media-queries');

const cssFiles = [
	'./src/css/some.css',
	'./node_modules/normalize.css/normalize.css',
	'./src/css/**/*.css'
];

function styles() {
	//return gulp.src('./src/css/**/*.css')
	return gulp.src(cssFiles)
		.pipe(concat('all.css'))
		.pipe(autoprefixer({
            browsers: ['>0.1%'],
            cascade: false
        }))
		.pipe(gcmq())
		.pipe(sourcemaps.init())
        .pipe(cleanCSS({
        	level: 2
        }))
        .pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('./build/css'))
		.pipe(browserSync.stream());
}

function watch() {
	browserSync.init({
        server: {
            baseDir: "./"
        }
    });
	gulp.watch('./src/css/**/*.css', styles)
	gulp.watch("./*.html").on('change', browserSync.reload);﻿
}

function clean() {
	return del(['build/*'])
}

gulp.task('styles', styles);
gulp.task('clean', clean);
gulp.task('watch', watch);

gulp.task('build', gulp.series(clean,
	gulp.parallel(styles)
	));

gulp.task('dev', gulp.series('build','watch')); 