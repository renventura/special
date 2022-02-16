const gulp = require("gulp");
const { series, parallel, watch } = gulp;
const sass = require("gulp-sass");
const autoprefixer = require("gulp-autoprefixer");
const concat = require("gulp-concat");
const imagemin = require("gulp-imagemin");
const plumber = require("gulp-plumber");
const rename = require("gulp-rename");
const uglify = require("gulp-uglify");
const uglifycss = require("gulp-uglifycss");

/* 
// The `clean` function is not exported so it can be considered a private task.
// It can still be used within the `series()` composition.
function clean(cb) {
  // body omitted
  cb();
}

// The `build` function is exported so it is public and can be run with the `gulp` command.
// It can also be used within the `series()` composition.
function build(cb) {
  // body omitted
  cb();
} 
*/

/**
 *	Styles task
 *		- Run Sass on partials
 *		- On main.scss, run Sass, autoprefixer, rename to main.css, and send to /css
 *		- On /css/main.css, rename to main.min.css, uglify, and add to /css
 */
function generateCSS(src, name, minName) {
  gulp
    .src(src)
    .pipe(plumber())
    .pipe(rename(name))
    .pipe(
      sass({
        outputStyle: "expanded",
        indentType: "tab",
        indentWidth: 1,
      })
    )
    .pipe(autoprefixer())
    .pipe(gulp.dest("css"))
    .on("end", function () {
      gulp
        .src("css/" + name)
        .pipe(rename(minName))
        .pipe(uglifycss())
        .pipe(gulp.dest("css"));
    });
}

/**
 *	Scripts task
 *		- Concatenate to scripts.js
 *		- Rename to *.min.js with /min directory
 *		- Uglify
 *		- Send to destination
 */
function scripts(cb) {
  gulp
    .src("js/components/*.js")
    .pipe(plumber())
    .pipe(concat("scripts.js"))
    .pipe(
      rename(function (path) {
        path.basename += ".min";
        path.extname = ".js";
      })
    )
    .pipe(uglify())
    .pipe(gulp.dest("js"));
  cb();
}
function globalStyles(cb) {
  generateCSS("sass/main.scss", "main.css", "main.min.css");
  cb();
}
function frontPageStyles(cb) {
  generateCSS("sass/front-page.scss", "front-page.css", "front-page.min.css");
  cb();
}
function wooStyles(cb) {
  generateCSS("sass/woocommerce.scss", "woocommerce.css", "woocommerce.min.css");
  cb();
}
function landingStyles(cb) {
  generateCSS("sass/landing-page.scss", "landing-page.css", "landing-page.min.css");
  cb();
}
function images(cb) {
  gulp.src("images/*.{png,gif,jpg}").pipe(imagemin()).pipe(gulp.dest("images"));
  cb();
}

function watchFiles(cb) {
  watch("js/components/*.js", scripts);
  watch("sass/**/*.scss", globalStyles);
  watch("sass/front-page.scss", frontPageStyles);
  watch("sass/landing-page.scss", landingStyles);
  watch("images", images);
  cb();
}

exports.scripts = scripts;
exports.globalStyles = globalStyles;
exports.frontPageStyles = frontPageStyles;
exports.wooStyles = wooStyles;
exports.landingStyles = landingStyles;
exports.images = images;
exports.watchFiles = watchFiles;
exports.default = series(scripts, globalStyles, frontPageStyles, wooStyles, landingStyles, images, watchFiles);
