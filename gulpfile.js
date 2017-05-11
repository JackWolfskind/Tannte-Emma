var gulp = require('gulp-help')(require('gulp'));
var del = require('del');
var fs = require('fs');
var gulpif = require('gulp-if');
var imagemin = require('gulp-imagemin');
var less = require('gulp-less');
var merge = require('merge-stream');
var minify = require('gulp-minify-css');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var minimist = require('minimist');
var path = require('path');
var pump = require('pump');
var webpack = require('webpack-stream');
var ngAnnotatePlugin = require('ng-annotate-webpack-plugin');

// command line parameters
var allowedOptions = {
    string: 'env',
    default: {env: 'dev'}
};
// custom values
var src = 'app/Resources';
var dist = 'web/public';
var cache = 'var/cache/';

gulp.task('build', 'Build everything', [
    'js-bundle',
    'copy',
    'css-adminlte',
    'css-bootstrap',
    'css-app'
]);

gulp.task('default', 'Watch development resources and rebuild/redeploy on changes.', ['build'], function () {
    gulp.watch(src + '/css/**/*', ['css-app']);
    gulp.watch([src + '/js/**/*'], ['js-bundle']);
});

gulp.task('js-bundle', 'bundle js source', ['copy'], function () {
    return gulp.src([src + '/js/vendor.js'])
            .pipe(webpack({
                plugins: [
                    new ngAnnotatePlugin({
                        add: true
                    })
                ],
                output: {
                    filename: 'vendor.js'
                }
            }))
            .pipe(gulp.dest(dist + '/js'));
});


gulp.task('clean-css-app', 'Remove the built template CSS file.', function () {
    return del('public/css/app.min.css');
});

gulp.task('clean-css-adminlte', 'Remove the built AdminLTE CSS file.', function () {
    return del('public/css/adminlte.min.css');
});

gulp.task('css-bootstrap', 'Compile all application Less sources.', ['clean-css-app'], function () {
    return gulp.src('node_modules/bootstrap/dist/**/*')
            .pipe(gulp.dest(dist + '/css/bootstrap/'));
});

gulp.task('css-adminlte', 'Compile all AdminLTE Less sources.', ['clean-css-adminlte'], function () {
    return gulp.src([src + '/less/AdminLTE.less', src + '/less/skins/*'])
            .pipe(less())
            .pipe(concat('adminlte.css'))
            .pipe(minify())
            .pipe(rename({suffix: '.min'}))
            .pipe(gulp.dest(dist + '/css'));
});

gulp.task('css-app', 'Compile all application Less sources.', ['clean-css-app'], function () {
    return gulp.src(src + '/css/app.css')
            .pipe(concat('app.css'))
            .pipe(minify())
            .pipe(rename({suffix: '.min'}))
            .pipe(gulp.dest(dist + '/css'));
});

gulp.task('clean-js-app', 'Remove only app js file.', function () {
    return del(dist + '/js/app.js');
});

gulp.task('copy', 'Copy all files to the dist folder which don\'t need to be built.', ['clean-copy'], function () {
    return merge(
            gulp.src(src + '/fonts/fontawesome-webfont.*').pipe(gulp.dest(dist + '/fonts')),
            gulp.src(src + '/plugins/**/*').pipe(gulp.dest(dist + '/plugins')),
            gulp.src([src + '/js/app.js', src + '/js/vendor.js']).pipe(gulp.dest(dist + "/js"))
            );
});
gulp.task('clean-copy', 'Remove all copied sources.', function () {
    return del(['public/fonts', 'public/plugins']);
});