# Official Strategic Communication WordPress Theme #

* Version 0.0.1
* [Learn Markdown](https://bitbucket.org/tutorials/markdowndemo)
* Tested up to WordPress 5.4
* UCLA Strat Comm recommendations on WordPress approved plugins and practices,[go here](https://spaces.ais.ucla.edu/display/ucomm/WordPress).
* To get linked into the Campus WordFence Central please reach out to svosburgh@stratcomm.ucla.edu

### How do I get set up? ###

*Get Started*

This is an advanced WordPress development environment and in order to understand this documentation there is some required knowledge that is assumed. That is not meant to deter anyone, if you've made it this far you're already on to something. Follow the instructions in this documentation, read the documentation in the links closely, read some stack overflow posts or articles when you run into errors, and you can get started in this theme. Be patient. If you are unfamiliar with these tools and learn how to use this theme, you will become a better developer. Let's get started.

Run WordPress on your choice of local setup. If you dont know how to do this there are multiple solutions. Pick the one that works best for you.
* [Mac](https://www.themeum.com/install-wordpress-localhost/)
* [PC](https://themeisle.com/blog/install-xampp-and-wordpress-locally/)
* [Kinsta](https://kinsta.com/blog/install-wordpress-locally/)
* [Flywheel](https://localwp.com/)
* [Google search](https://www.google.com/search?q=setup+wordpress+locally&oq=setup+wordpress+locally&aqs=chrome..69i57j0l7.3734j0j9&sourceid=chrome&ie=UTF-8)

Pull this repository into a wp-content/themes/ucla-sc. The ucla-sc folder should be your root folder of the theme.
* [git](https://git-scm.com/doc)
* [SourceTree](https://www.sourcetreeapp.com/)

To edit this theme please [install NPM](https://www.npmjs.com/get-npm) on your machine and follow the steps below.


Use terminal on Mac or command prompt on PC and navigate to the theme folder. Run npm install
```
npm install
```

This project requires Gulp. Installing gulp on your machine may require another step. -- https://gulpjs.com/docs/en/getting-started/quick-start


*Build Commands (Run these commands while in theme folder on terminal or command prompt.)*

Test to see that gulp is installed and working.
```
gulp
```

Run gulp watch when you are performing js or scss updates in the ./assets folder. This command automatically compiles the styles and javascript while you edit them. Watch also runs the style and javascript linters. These linters will report errors and the line they are on in your terminal or command prompt when made. Errors will prevent your code from compiling and your page from updating. Errors found in gulp watch will prevent a gulp production run. This will prevent automatic site updates in certain hosting environments. We use these tools in addition to version control to ensure quality websites and deployments with no downtime. Pull requests with watch errors will immediately be rejected.
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

* Code review is preformed by Strategic Communications and DCP for ADA compliance if necessary.
* All commits must be on brand according to the UCLA Brand Guidelines website and ADA compliant.
* This repository follows the same [UCLA Web Component Library contributing guidelines](https://ucla-fractal.s3-us-west-1.amazonaws.com/build/docs/contribute/contributing.html).

### Who do I talk to? ###

* UCLA Strategic Communications Department
* Repo admin svosburgh@stratcomm.ucla.edu
