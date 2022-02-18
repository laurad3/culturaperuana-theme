/**
 * Dev Packages
 */

const { src, dest, parallel, series, watch } = require('gulp');

const del = require('del');
const uglify = require('gulp-uglify');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const flatten = require('gulp-flatten');
const log = require('fancy-log');
const colors = require('ansi-colors');
const gulpif = require('gulp-if');
const sassInheritance = require('gulp-sass-inheritance');
const cached = require('gulp-cached');
const bro = require('gulp-bro');
const babelify = require('babelify');

const config = {
    inputDir: './src',
    dist: './dist'
};

/**
 * Styles
 */

function css() {
    return src(`${config.inputDir}/**/*.scss`)
        .pipe(gulpif(global.isWatching, cached('css')))
        .pipe(sassInheritance({
            dir: `${config.inputDir}`
        }))
        .pipe(
            sass({
                sourceComments: true,
                includePaths: ['node_modules/'],
            }).on('error', function errorHandler(err) {
                log(colors.red(`ERROR (sass): ${err.message}`));
                this.emit('end');
            }),
        )
        .pipe(autoprefixer())
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(flatten())
        .pipe(dest(`${config.dist}/css/`));
}

/**
 * Scripts
 */

function js() {
    return src(`${config.inputDir}/js/*.js`)
    .pipe(bro({
        debug: true,
        transform: [
            babelify.configure({
                presets: ['@babel/preset-env']
            }),
        ]
    }))
    .pipe(gulpif(global.isWatching, cached('js')))
    .pipe(uglify())
    .pipe(dest(`${config.dist}/js/`));
}

/**
 * Clean
 */

function clean() {
    return del(`${config.dist}/**/*`);
}

/**
 * Watch
 */

function watchFiles() {
    global.isWatching = true;
    watch(`${config.inputDir}/**/*.scss`, series(css));
    watch(`${config.inputDir}/**/*.js`, series(js));
}

// Public task (can be run with the gulp command e.g. gulp sass)
exports.sass = css;
exports.js = js;

// Private task
exports.default = series(
    clean,
    parallel(css, js),
    parallel(watchFiles)
);