const browserSync = require('browser-sync');
const concat = require('gulp-concat');
const connect = require('gulp-connect-php');
const cssnano = require('cssnano');
const postcssPresetEnv = require('postcss-preset-env');
const autoprefixer = require('autoprefixer');
const del = require('del');
const fs = require('fs');
const gulp = require('gulp');
const gutil = require('gulp-util');
const inject = require('gulp-inject-string');
const partialimport = require('postcss-easy-import');
const plumber = require('gulp-plumber');
const postcss = require('gulp-postcss');
const remoteSrc = require('gulp-remote-src');
const sourcemaps = require('gulp-sourcemaps');
const uglify = require('gulp-uglify-es').default;
const unzip = require('gulp-unzip');
const merge = require('merge-stream');

const sass = require('gulp-sass');
const dotenv = require('dotenv').config({
    path: process.cwd() + '/.env'
});

const publicDir = 'public_html/';

/* -------------------------------------------------------------------------------------------------
Theme Name
-------------------------------------------------------------------------------------------------- */

const themeName = process.env.THEME_NAME;

/* -------------------------------------------------------------------------------------------------
PostCSS Plugins
-------------------------------------------------------------------------------------------------- */

const pluginsDev = [
    partialimport,
    postcssPresetEnv({
        features: {
            colorHexAlpha: false
        }
    })
];

const pluginsProd = [
    partialimport,
    postcssPresetEnv({
        features: {
            colorHexAlpha: false
        },
        discardComments: {
            removeAll: true
        }
    }),
    autoprefixer({overrideBrowserslist: ['last 3 versions']}),
    cssnano()
];

/* -------------------------------------------------------------------------------------------------
JavaScript & CSS Vendor Bundles
-------------------------------------------------------------------------------------------------- */

const headerJS = [
    'node_modules/jquery-mask-plugin/dist/jquery.mask.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
    'node_modules/moment/min/moment.min.js',
    'node_modules/parsleyjs/dist/parsley.min.js',
    'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
    'node_modules/selectize/dist/js/standalone/selectize.min.js',
    'node_modules/aos/dist/aos.js',
    'src/js/modernizr.custom.js',
    'node_modules/owl.carousel/dist/owl.carousel.min.js'
];

const footerJS = [
    'src/js/app.js'
];

const libsCSS = [
    'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
    'node_modules/aos/dist/aos.css'
];

/* -------------------------------------------------------------------------------------------------
Installation Tasks
-------------------------------------------------------------------------------------------------- */
gulp.task('default');

gulp.task('cleanup', () => {
    del([publicDir + 'wordpress/**']);
});

gulp.task('download-wordpress', () => {
    remoteSrc(['latest.zip'], {
        base: 'https://wordpress.org/'
    })
        .pipe(gulp.dest(publicDir));
});

gulp.task('setup', [
    'unzip-wordpress',
    'copy-config'
]);

gulp.task('unzip-wordpress', () => {
    gulp.src(publicDir + 'latest.zip')
        .pipe(unzip())
        .pipe(gulp.dest(publicDir))
});

gulp.task('copy-config', () => {
    gulp.src('wp-config.php')
        .pipe(inject.after('define(\'DB_COLLATE\', \'\');', '\ndefine(\'DISABLE_WP_CRON\', true);'))
        .pipe(gulp.dest(publicDir + 'wordpress'))
        .on('end', () => {
            gutil.beep();
            gutil.log(devServerReady);
        });
});

gulp.task('fresh-install', () => {
    del(['src/**']).then(() => {
        gulp.src('tools/fresh-theme/**')
            .pipe(gulp.dest('src'))
    });
});

/* -------------------------------------------------------------------------------------------------
Development Tasks
-------------------------------------------------------------------------------------------------- */

gulp.task('dev', [
    'copy-theme-dev',
    'style-dev',
    'header-scripts-dev',
    'footer-scripts-dev',
    'plugins-dev',
    'watch'

], () => {
    connect.server({
        base: publicDir,
        port: '3020'
    }, () => {
        browserSync({
            proxy: process.env.SITE_URL,
            open: false
        });
    });
});

gulp.task('copy-theme-dev', () => {
    if (!fs.existsSync(publicDir)) {
        gutil.log(buildNotFound);
        process.exit(1);
    } else {
        gulp.src('src/themes/**')
            .pipe(gulp.dest(publicDir + 'wordpress/wp-content/themes/'));
    }
});

gulp.task('style-dev', () => {
    var sassStream, cssStream;

    // Compile sass
    sassStream = gulp.src("src/style/style.scss")
        .pipe(sourcemaps.init())
        .pipe(sass().on("error", sass.logError))
        .pipe(postcss(pluginsDev))
        .pipe(sourcemaps.write("."))
        .pipe(gulp.dest(publicDir + 'wordpress/wp-content/themes/' + themeName + '/style'));

    // Additional css files
    cssStream = gulp.src(libsCSS);

    // Merge the two streams
    return merge(sassStream, cssStream)
        .pipe(concat(publicDir + 'wordpress/wp-content/themes/' + themeName + '/style/style.css'))
        .pipe(gulp.dest('./'))
        .pipe(browserSync.stream({match: "**/*.css"}));
});

gulp.task('header-scripts-dev', () => {
    return gulp.src(headerJS)
        .pipe(plumber({errorHandler: onError}))
        .pipe(sourcemaps.init())
        .pipe(concat('header-bundle.js'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(publicDir + 'wordpress/wp-content/themes/' + themeName + '/js'));
});

gulp.task('footer-scripts-dev', () => {
    return gulp.src(footerJS)
        .pipe(plumber({errorHandler: onError}))
        .pipe(sourcemaps.init())
        .pipe(concat('footer-bundle.js'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(publicDir + 'wordpress/wp-content/themes/' + themeName + '/js'));
});

gulp.task('plugins-dev', () => {
    return gulp.src('src/plugins/**')
        .pipe(gulp.dest(publicDir + 'wordpress/wp-content/plugins'));
});

gulp.task('reload-js', ['footer-scripts-dev', 'header-scripts-dev'], (done) => {
    browserSync.reload();
    done();
});

gulp.task('reload-theme', ['copy-theme-dev'], (done) => {
    browserSync.reload();
    done();
});

gulp.task('reload-plugins', ['plugins-dev'], (done) => {
    browserSync.reload();
    done();
});

gulp.task('watch', () => {
    gulp.watch(['src/style/**/*.scss'], ['style-dev']);
    gulp.watch(['src/js/**'], ['reload-js']);
    gulp.watch(['src/themes/**'], ['reload-theme']);
    gulp.watch(['src/plugins/**'], ['reload-plugins'])
});

/* -------------------------------------------------------------------------------------------------
Production Tasks
-------------------------------------------------------------------------------------------------- */

gulp.task('prod', [
    'copy-theme-prod',
    'style-prod',
    'header-scripts-prod',
    'footer-scripts-prod',
    'plugins-prod'
]);

gulp.task('copy-theme-prod', () => {
    gulp.src(['src/themes/**'])
        .pipe(gulp.dest('dist/themes/'))
});

gulp.task('style-prod', () => {
    var sassStream, cssStream;

    // Compile sass
    sassStream = gulp.src("src/style/style.scss")
        .pipe(sass().on("error", sass.logError))
        .pipe(postcss(pluginsProd))
        .pipe(gulp.dest('dist/themes/' + themeName + '/style'));

    // Additional css files
    cssStream = gulp.src(libsCSS);

    // Merge the two streams
    return merge(sassStream, cssStream)
        .pipe(concat('dist/themes/' + themeName + '/style/style.css'))
        .pipe(gulp.dest('./'));
});

gulp.task('header-scripts-prod', () => {
    return gulp.src(headerJS)
        .pipe(plumber({errorHandler: onError}))
        .pipe(concat('header-bundle.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/themes/' + themeName + '/js'));
});

gulp.task('footer-scripts-prod', () => {
    return gulp.src(footerJS)
        .pipe(plumber({errorHandler: onError}))
        .pipe(concat('footer-bundle.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/themes/' + themeName + '/js'));
});

gulp.task('plugins-prod', () => {
    return gulp.src('src/plugins/**')
        .pipe(gulp.dest('dist/plugins'));
});

/* -------------------------------------------------------------------------------------------------
Utility Tasks
-------------------------------------------------------------------------------------------------- */
const onError = (err) => {
    gutil.beep();
    gutil.log(wpFy + ' - ' + errorMsg + ' ' + err.toString());
    this.emit('end');
};

const errorMsg = '\x1b[41mError\x1b[0m';
const devServerReady = 'Your development server is ready, start the workflow with the command: $ \x1b[1mnpm run dev\x1b[0m';
const buildNotFound = errorMsg + ' ⚠️　- You need to install WordPress first. Run the command: $ \x1b[1mnpm run install:wordpress\x1b[0m';
const wpFy = 'Gulp';