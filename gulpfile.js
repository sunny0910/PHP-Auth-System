var gulp = require('gulp'),
    con = require('gulp-concat'),
    minify = require('gulp-minify'),
    merge = require('gulp-merge'),
    gs = require('gulp-sass');


gulp.task('default',function(){
    gulp.watch('resources/assets/styles/scss/*.scss',['styles']);
    gulp.watch('./resources/assets/scripts/*.js',['scripts']);
    gulp.watch('./gulpfile.js',['styles','scripts']);
});

gulp.task('scripts',function(){
    gulp.src(['./node_modules/jquery/dist/jquery.min.js','./node_modules/sweetalert2/dist/sweetalert2.js','./node_modules/jquery-validation/dist/jquery.validate.js','./resources/assets/scripts/**/*.js'])
        .pipe(con('output.js'))
        .pipe(gulp.dest('./public/assets/js'));
});

gulp.task('styles',function(){
    var sass,css;
    sass=gulp.src('./resources/assets/styles/scss/**/*.scss')
              .pipe(gs().on('error',gs.logError));

    css=gulp.src(['./resources/assets/styles/css/**/*.css','./node_modules/sweetalert2/dist/sweetalert2.css']);

    merge(css,sass)
    .pipe(minify())
    .pipe(con('main.css'))
    .pipe(gulp.dest('./public/assets/css'));
});
