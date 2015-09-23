# Zelda

A responsive theme designed for business or magazine layouts. Select pages or posts to display on the showcase templates. Fonts and colors are customizable.

## Installation Instructions

This theme can be installed under "Appearance" > "Themes".  Click on the "Add New" button to upload the theme zip file.

## Developer Instructions

### Grunt

This theme uses Grunt to compile SASS and Javascript.  It also generates translation files, autoprefixes styles, and concats and minifies scripts.

If you have Grunt installed, just run `npm install` in the theme directory to download dependencies.

`grunt watch` can be used while editing SASS and JS.
`grunt release` should be used before browser testing or releasing.

## Change Log

1.1.3 (Development)
---

* Update: Make function overrides easier from child themes

1.1.2 (07/16/2015)
---

* Fix: Page corner background color in IE

1.1.1 (07/15/2015)
---

* Fix: Missing JetPack Color library

1.1.0 (07/15/2015)
---

* Fix: Hover state of site logo in Firefox
* Update: Move image size setup into its own function
* Update: Use the_post_navigation and the_posts_navigation functions
* Update: Add support for title-tag
* Enhancement: Option to display featured image in post meta

1.0.1 (03/03/2015)
---

* Bugfix: Make showcase templates compatible with PHP5.3

1.0.0 (02/10/2015)
---

* Initial release