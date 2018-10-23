# Inpsyde Mountain Conqueror theme

## Technical info
This theme does not use any starter theme but was created from the ground up.
It only depends on the [CarbonFields library](https://carbonfields.net) to easily create an Options admin page.

It uses Gulp for easier management (for SCSS & JS compiling and minification, browser live reloading, translation files creation).

It was developed with flexibility in mind (with hooks, `function_exists()` checks and so on) to let plugin developers interact with it and give users a good base to extend the theme by creating child-themes.

### Side notes
Because the Event-related plugin is not implemented, I did not take care of Event posts reordering on the events archive page.
Logically, the event posts would be sorted by event date (and not event post publication date), probably by hooking on `pre_get_posts` to alter the default $query and order the posts based on a meta value. 
But that logic would probably be part of the plugin in charge of the Event back-end.

## Hooks (actions & filters)
[A list of all hooks and their description](HOOKS.md) is available in the HOOKS.md file and will be regularly updated.

## Testing Events with the theme
To support and enable the management of Events via the theme (while the plugin is in development), set the `twinty_USE_DUMMY_EVENT_CLASS` to `true` in your wp-config.php file, as such :
```
define( 'twinty_USE_DUMMY_EVENT_CLASS', true );
```

## Installation
Use `git clone` to clone the repository in your /wp-content/themes/ folder.
Then, you will need to `cd` in the theme folder and do a `composer install` to install the required library.

### Using composer
You first need to add the private repo to your composer.json file:
```
composer config repositories.repo-name vcs git@bitbucket.org:pskli/mountain-conqueror.git
```

Then require the theme package with:
```
composer require pskli/mountain-conqueror
```
or, if you want to test the development version:
```
composer require pskli/mountain-conqueror:dev-develop
```

### Troubleshooting
If you are using Composer to install WP and its assets from your site root folder, you might have to do 2 things.

##### 1. 
Be sure to load your composer autoloader in wp-config.php, like such for example:
```
define( 'COMPOSER_AUTOLOADER_PATH', ABSPATH . 'vendor/autoload.php' );
require_once COMPOSER_AUTOLOADER_PATH;
```
Defining a `COMPOSER_AUTOLOADER_PATH` constant will disable the theme Composer autoloader.

##### 2. 
If the Theme Options admin page does not display any assets and you get 404 in your console, it's probably due to a specific /vendor/ directory location. You can tell the library where your /vendor/ directory is located by doing so in your wp-config.php file:
```
define ( 'Carbon_Fields\URL', 'http://your.site.url.to/vendor/htmlburger/carbon-fields' );
```

### Changelog
#### 1.0.3 - 2018-10-10
IE CSS fixes.

#### 1.0.2 - 2018-10-10
Adding explanation to README on how to be able to test events with the theme, without plugin.

#### 1.0.1 - 2018-10-10
Minor update to README file.

#### 1.0.0 - 2018-10-10
First version of the theme, following the requirements for the Inpsyde code exercise.