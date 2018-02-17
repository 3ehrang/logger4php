# Logger4php
Apache log4php in Laravel

Laravel Log4php
=================

Package to enable log4php

Installation
----

Update your `composer.json` file to include this package as a dependency

Laravel 5

```json
composer require "i3ehrang/logger4php:dev-master"
```

Register the Logger4php service provider by adding it to the providers array.
```php
'providers' => array(
	...
	'I3ehrang\Logger4php\Logger4phpServiceProvider'
)
```

Alias the Logger4php facade by adding it to the aliases array in the `app/config/app.php` file.
```php
'aliases' => array(
	...
	'Logger4php' => I3ehrang\Logger4php\Facades\Logger4php::class
)
```

# Configuration

Copy the config file from vendor into your project and change it as your own

```
\vendor\i3ehrang\logger4php\src\config\logger4php.php
```

##### Optional: copy `\vendor\i3ehrang\logger4php\src\log4php.xml` to your app\config for customize.

# Usage
```php
use Logger4php;

Logger4php::setParams(['user' => 'John', 'id' => '1'])
    ->info();

```

This package is wrapps [Log4php Package] for Laravel 5.

[Log4php Config Package]:https://logging.apache.org/log4php/docs/configuration.html
[Log4php Package]:http://logging.apache.org/log4php/
