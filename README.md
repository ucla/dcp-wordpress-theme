# Official Strategic Communication WordPress Theme #

* Version 0.7.1
* Tested up to WordPress 5.5.1 - 5.7.0


Welcome to the official UCLA WordPress theme. This theme was created through a collaboration effort between Strategic Communications and DCP to ensure that it is inline with the UCLA brand and ADA compliant.

### WordPress Install ###
To install this theme on your WordPress site, download the full zip file of the distribution branch. Go to Appearance > Themes in the left hand menu of the WordPress admin and then select the "Add New" button on the themes page. Upload the zip file and activate the new uploaded theme.

### Child Theme Development ###
You can download and install the child theme ucla-wp-child [here](https://bitbucket.org/uclaucomm/ucla-wp-child/src/distribution/).

### Development Parent Theme ###

*Get Started*

This is an advanced WordPress development environment and in order to understand this documentation there is some required knowledge that is assumed. Do not let this stop you from learning how to use this theme. If you've made it this far you're already on your way. Follow the instructions in this documentation. This theme uses NPM and Gulp, but you do not have to be an expert on these topics. Read some stack overflow posts or articles if you run into errors, and you can get started in this theme. Be patient. If you are unfamiliar with these tools and learn how to use this theme, you will become a better developer.

WordPress will need to be installed and run on your local computer. If you don't know how to do this there are multiple solutions. Below are some helpful articles and different ways to setup an environment. Feel free to use one of these or do your own research.
* [setup on Mac](https://www.themeum.com/install-wordpress-localhost/)
* [Setup on PC](https://themeisle.com/blog/install-xampp-and-wordpress-locally/)
* [Flywheel local development](https://localwp.com/)


Pull this repository into a wp-content/themes/ucla-wp. The ucla-wp folder should be your root folder of the theme.
* [git](https://git-scm.com/doc)
* [SourceTree](https://www.sourcetreeapp.com/)

To edit this theme please [install NPM](https://www.npmjs.com/get-npm) on your machine and follow the steps below.


Use terminal on Mac or command prompt on PC and navigate to the theme folder. Run npm install
```
npm install
```

This project requires Gulp. Installing gulp on your machine may require another step. -- https://gulpjs.com/docs/en/getting-started/quick-start


*Build Commands (Run these commands while in theme folder on terminal or command prompt.)*

Run `gulp` from the themes root folder to see that gulp is installed and working.
```
gulp
```

Run `gulp watch` when you are performing js or scss updates in the ./assets folder. This command automatically compiles the styles and javascript while you edit them. Watch also runs the style and javascript linters. These linters will report errors and the line they are on in your terminal or command prompt when made. Errors will prevent your code from compiling and your page from updating. Errors found in gulp watch will prevent a gulp production run. This will prevent automatic site updates in certain hosting environments. We use these tools in addition to version control to ensure quality websites and deployments with no downtime. Pull requests with watch errors will immediately be rejected.
```
gulp watch
```

Build creates uncompiled css and javascript assets in ./dist for quicker and cheaper build pipelines to a staging site. Build minutes cost money. Pull requests with build errors will immediately be rejected.
```
gulp build
```

Production builds compile the css and javascript assets without tabs or spaces. This causes slightly longer build times in pipelines, but produces faster loading times and better bandwidth management on a production sites. This results in cheaper hosting costs with AWS or other platforms. Pull requests with production errors will immediately be rejected.
**EACH TIME YOU PULL UPDATES FROM THE REPO YOU MUST RUN "gulp production" TO ENSURE YOU HAVE THE PROPER ASSETS IN THE ./dist FOLDER.**
```
gulp production
```

### Contribution guidelines ###

* Code review is performed by Strategic Communications and DCP for ADA compliance if necessary.
* All commits must be on brand according to the UCLA Brand Guidelines website and ADA compliant.
* This repository follows the same [UCLA Web Component Library contributing guidelines](https://ucla-fractal.s3-us-west-1.amazonaws.com/build/docs/contribute/contributing.html).

### Have questions on how to consume or contribute to this library? Please reach our development team at Strategic Communications: ###

* Scott Vosburgh (Senior Frontend Developer) - svosburgh@stratcomm.ucla.edu

## CHANGELOG ##
**0.7.1 - 3/24/21**

* Update class naming bug in page templates
* Add front page no sidebar no hero
* Add edit post link to page template when logged in
* Fix search sidebar display bug

**0.7.0 - 3/18/21**

* Improve template naming conventions
* Remove leftover covid site styles
* Add margins for ".entry-content" heading only. AKA gutenberg headings
* Update resources widget and move to top of dashboard
* Update UCLA Component Library package

**0.6.1 - 3/10/21**

* Fix front page templating issues
* Fix minor table issue
* Adjust image size on custom template banner to prevent blurry images
* Add custom template with no banner and no sidebar
* Add custom template with no banner and left sidebar
* Add custom template with no banner and right sidebar
* Remove covid website specific templates and CSS

**0.6.0 - 2/2/21**

* add custom template
* add front page one template and files for front page two template to show naming convention
* adjust breadcrumb spacing
* add some Gutenberg specific adjustments for improved branding foolproof
* Update to readme

**0.5.1 - 1/29/21**

* rename archive page to home.php and finish loop development
* add unboxed pagination style to WordPress native classes
* add responsive embed theme support
* readme updates

**0.5.0 - 1/28/21**

* update UCLA components library package
* Remove main menu requirement for primary navigation
* Fix spelling errors
* Fix Minor CSS Issues, Category Pages, and Component Library Installation
* Override line height when editors use Gutenberg typography settings.
