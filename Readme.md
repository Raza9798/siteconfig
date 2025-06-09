# SiteConfig Laravel Package
This Laravel package provides a simple and efficient way to manage site settings / enviromental variables via database. You can store, retrieve, update, and delete configuration settings on a application using the SiteConfig class.


## Installation
To install the package, add it to your Laravel project using Composer:
```shell
$ composer require raza9798/siteconfig
$ php artisan siteconfig:env-sync
```

# Usage

usage in the web base application
```php
# import facade 
use Core\Siteconfig\Config;

# working with method 
Config::save('phone', '123'); # store method
Config::show('phone'); # get method
Config::update('phone', '18487'); # update method
Config::delete('phone'); #delete method
Config::list(); # showing all variables as array
```
