# Upgrading Guide

From v2.x to v3.x
=================

This is guide for upgrade from version 2.x to 3.x of this package.

The 3.x version of this package was created to support Laravel 8.x and later, not for previous Laravel versions. It is implemented with the [PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) version 3.x, which has some special changes compared to 2.x. Therefore, this package must also be changed to be compatible. Here are some notable ones:

## Changing the name of some files

| 2.x             | 3.x                   | Description                        |
| --------------- | --------------------- | ---------------------------------- |
| `.php_cs`       | `.php-cs-fixer.php`   | Published Fixer configuration file |
| `.php_cs.cache` | `.php-cs-fixer.cache` | Cache file                         |

## Fixer Config initialization method in the published Fixer configuration file

| 2.x                             | 3.x               |
| ------------------------------- | ----------------- |
| use static `::create()` method. | use `constructor` |

**Example:**

Before (in 2.x):
```php
<?php

use PhpCsFixer\Config;

// ...

return Config::create()
    ->setFinder($finder)
    ->setRules($rules)
    ->setUsingCache(true);

```

Now (in 3.x):
```php
<?php

use PhpCsFixer\Config;

// ...

$config = new Config;

return $config
    ->setFinder($finder)
    ->setRules($rules)
    ->setUsingCache(true);

```

## Inherited default rule set in this package

| 2.x                           | 3.x                              |
| ----------------------------- | -------------------------------- |
| `@Symfony` + _some overrides_ | `@PhpCsFixer` + _some overrides_ |

If you want to learn more about the changes of the **PHP-CS-Fixer 3.x**, please see [here](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/UPGRADE-v3.md)
