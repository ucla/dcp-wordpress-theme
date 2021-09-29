# :school_satchel: UCLA WordPress Theme

This theme was created through a collaboration effort between Strategic Communications and DCP to ensure that it is inline with the UCLA brand and ADA compliant.

---

* Version 0.8.0-Beta
* Tested up to WordPress 5.5.1 - 5.8.3

### Install your WordPress Theme ###

To install this theme on your WordPress site.

1. Download the full zip file of the distribution branch.
2. Unzip the downloaded file and change the top level folder name to ucla-wp.
3. Re-zip the file with the file name `ucla-wp.zip`.
4. Log into your WordPress dashboard and go to Appearance > Themes in the left hand menu of the WordPress admin.
5. Select the "Add New" button on the themes page. Upload the zip file and activate the new uploaded theme.

Your theme should now be visible on the front end of the webiste.

<hr/>

### Child Theme Development ###
You can download and install the child theme ucla-wp-child [here](https://bitbucket.org/uclaucomm/ucla-wp-child/src/distribution/).

<hr/>

[Contribute to this repository](./docs/contribute.md)

<hr/>

## Most Recent Update ##

**%!CurrentVersion%! - 9/29/21**

* Update Readme
* Add CHANGELOG
* Add custom color palette to admin
* Add fluid backgrounds for blue, white and three shades of grey.
* Remove query loops from all template pages since they can now be made in the Gutenberg editor.
* Remove no sidebar, no hero template because query loops can now be made in editor rendering the template unnecessary.
* Update list of usable core blocks. Remove blocks that weren't styled for brand or needed in-house compliance testing
* New files added to theme theme.json, style-editor.css and style-login.css. See comments at top of files for descriptions.
* Update UCLA component library version to beta-16.

[Changelog](./CHANGELOG.md)
