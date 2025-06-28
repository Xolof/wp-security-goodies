
# WordPress Security Goodies

* Tags: security 
* Requires at least: 6.8.1
* Tested up to: 6.8.1
* Requires PHP: 7.4
* Text Domain: wsg 

Some security fixes for WordPress.

## Description
This plugin includes some security fixes which are useful for many WordPress projects.

In some cases it may break things, so please test it before deploying to production.

## Installation

### Without Composer

1. Upload the directory `wp-security-goodies` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

### With Composer

Add the repository to `repositories` in your `composer.json`.

```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/xolof/wp-security-goodies"
    }
],
```

Install the plugin.

`composer require xolof/wp-security-goodies`

## Changelog

### 0.0.1
* Disable xmlrpc.php
* Disable the REST API for unauthenticated users

