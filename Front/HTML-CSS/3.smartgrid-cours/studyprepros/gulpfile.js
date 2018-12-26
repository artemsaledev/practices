const gulp = require('gulp');
const concat = require('gulp-concat');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const del = require('del');
const browserSync = require('browser-sync').create();
const sourcemaps = require('gulp-sourcemaps');
const gcmq = require('gulp-group-css-media-queries');
const prepros = require('gulp-less');

const config = {
    src: './src',
    css: {
        watch: '/precss/**/*.less',
        src: '/precss/styles.less',
        dest: '/css'
    },
    html: {
        src: './index.html'
    }
};


function styles() {
  return gulp.src(config.src + config.css.src)
		.pipe(concat('all.css'))
		.pipe(sourcemaps.init())
     	.pipe(prepros())
		.pipe(gcmq())
		.pipe(autoprefixer({
            browsers: ['>0.1%'],
            cascade: false
        }))
        .pipe(cleanCSS({
        	level: 2
        }))
     	.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(config.src + config.css.dest))
		.pipe(browserSync.stream());
}

function watch() {
	browserSync.init({
        server: {
            baseDir: "./"
        }
    });
	gulp.watch(config.src + config.css.watch, styles)
	gulp.watch(config.src + config.html.src).on('change', browserSync.reload);﻿
}

function clean() {
	return del(['/css*'])
}

gulp.task('styles', styles);
gulp.task('clean', clean);
gulp.task('watch', watch);

gulp.task('build', gulp.series(clean,
	gulp.parallel(styles)
	));

gulp.task('dev', gulp.series('build','watch')); 