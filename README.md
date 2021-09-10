# Official Strategic Communication WordPress Theme #

* Version 0.7.2.2
* Tested up to WordPress 5.5.1 - 5.7.2


Welcome to the official UCLA WordPress theme. This theme was created through a collaboration effort between Strategic Communications and DCP to ensure that it is inline with the UCLA brand and ADA compliant.

### Install your WordPress Theme ###

To install this theme on your WordPress site.

1. Download the full zip file of the distribution branch.
2. Unzip the downloaded file and change the top level folder name to ucla-wp.
3. Re-zip the file with the file name `ucla-wp.zip`.
4. Log into your WordPress dashboard and go to Appearance > Themes in the left hand menu of the WordPress admin.
5. Select the "Add New" button on the themes page. Upload the zip file and activate the new uploaded theme.

Your theme should now be visible on the front end of the webiste.

### Child Theme Development ###
There is a child theme available. You can download and install the child theme ucla-wp-child [here](https://bitbucket.org/uclaucomm/ucla-wp-child/src/distribution/).

<hr/>

### Contribute to Parent Theme ###

*Get Setup Locally*

* Node Version 12.14.1
* NPM version 6.3.4
* Gulp version 4.0.2

This is parent theme for WordPress development. Follow the instructions in this documentation. This theme uses NPM and Gulp, but you do not have to be an expert on these topics. Be patient if you are unfamiliar with these tools.

1. WordPress will need to be installed and run on your local computer. If you don't know how to do this there are multiple ways. Below are some helpful articles to setup an environments. Feel free to use one of these or do your own research.
* [setup on Mac](https://www.themeum.com/install-wordpress-localhost/)
* [Setup on PC](https://themeisle.com/blog/install-xampp-and-wordpress-locally/)
* [Flywheel local development](https://localwp.com/)
2. Pull this repository into a `/your-root-site/wp-content/themes/ucla-wp`. The ucla-wp folder should be your root folder of the theme.
* [git](https://git-scm.com/doc)
* [SourceTree](https://www.sourcetreeapp.com/)
3. If not already installed you will need to install Node Package Manager. [install NPM](https://www.npmjs.com/get-npm) on your machine and follow the steps below.
4. Use terminal on Mac or command prompt on PC and navigate to the theme folder. Run `npm install`
5. This project requires Gulp. Installing gulp on your machine may require another step. -- https://gulpjs.com/docs/en/getting-started/quick-start

Once gulp is installed you will be able to run the following build commands.


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
**Each time updates are pulled from the repository run `gulp production` to ensure you have the proper assets in the ./dist folder.**
```
gulp production
```

### Contribution guidelines ###

* Code review is performed by Strategic Communications and DCP for ADA compliance if necessary.
* All commits must be on brand according to the UCLA Brand Guidelines website and ADA compliant.
* This repository follows the same [UCLA Web Component Library contributing guidelines](https://ucla-fractal.s3-us-west-1.amazonaws.com/build/docs/contribute/contributing.html).

<hr/>

### Have questions on how to consume or contribute to this library? Please reach our development team at Strategic Communications: ###

* Scott Vosburgh (Senior Frontend Developer) - svosburgh@stratcomm.ucla.edu

## CHANGELOG ##


**0.7.2.2 - 7/6/21**

* Readme updates
* Fix fluid class bug for Gutenberg groups
* Add styling for Query loop core block
* Update <hr> core styling to better reflect UCLA brand

**0.7.2.1 - 7/6/21**

* Firefox bug fix for primary navigation line breaking

**0.7.2 - 6/10/21**

* Remove extra space above headings
* UCLA component Library Beta v14 update

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
