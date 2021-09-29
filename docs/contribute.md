# :pencil: Making changes (Beta)

---

*Get Setup Locally*

* Node Version 12.14.1
* NPM version 6.3.4
* Gulp version 4.0.2

This is parent theme for WordPress development. Follow the instructions in this documentation. This theme uses NPM and Gulp, but you do not have to be an expert on these topics.

1. WordPress will need to be installed and run on your local computer. If you don't know how to do this there are multiple ways. Below are some helpful articles to setup an environments.
* [setup on Mac](https://www.themeum.com/install-wordpress-localhost/)
* [Setup on PC](https://themeisle.com/blog/install-xampp-and-wordpress-locally/)
* [Flywheel local development](https://localwp.com/)
2. Pull this repository into a `/your-root-site/wp-content/themes/ucla-wp`. The ucla-wp folder should be your root folder of the theme.
* [git](https://git-scm.com/doc)
* [SourceTree](https://www.sourcetreeapp.com/)
3. If not already installed you will need to install Node Package Manager. [install NPM](https://www.npmjs.com/get-npm) on your machine and follow the steps below.
4. Use terminal on Mac or command prompt on PC and navigate to the theme
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
* This repository follows the same [UCLA Web Component Library contributing guidelines](https://webcomponents.ucla.edu).

<hr/>
