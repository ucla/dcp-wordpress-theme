# Official Strategic Communication WordPress Theme #

* Version 0.0.1
* [Learn Markdown](https://bitbucket.org/tutorials/markdowndemo)
* Tested up to WordPress 5.4
* UCLA WordPress notes on approved plugins and practices.

### How do I get set up? ###

*Get Started*

Run WordPress on your choice of local setup. Pull the repository into a wp-content/themes/ucla-sc. The ucla-sc folder should be your root folder of the theme.


To edit this theme please install NPM and follow the steps below. -https://www.npmjs.com/get-npm


Run npm install
```
npm install
```

Installing gulp on your project may require another step. -- https://gulpjs.com/docs/en/getting-started/quick-start

Use terminal on mac or PC command prompt equivalent and navigate to the theme folder.

*Build Commands*

Test to see that gulp is installed and working.
```
gulp
```

Watch styles and javascript while updating theme.
```
gulp watch
```

Build uncompiled css and javascript assets in ./dist for quicker and cheaper pipelines to dev site.
```
gulp build
```

Build compiled assets. Causes slightly longer build times in pipelines, but produces faster loading times on a production site.
**EACH TIME YOU PULL UPDATES FROM THE REPO YOU MUST RUN "gulp production" TO ENSURE YOU HAVE THE PROPER ASSETS IN THE ./dist FOLDER.**
```
gulp production
```


### Contribution guidelines ###

* Code review is preformed by Strategic Communications and DCP if necessary.
* All commits must be on brand according to the UCLA Brand Guidelines website and ADA compliant.

### Who do I talk to? ###

* UCLA Strategic Communications Department
* Repo admin svosburgh@stratcomm.ucla.edu
