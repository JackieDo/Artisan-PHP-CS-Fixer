# Artisan PHP CS Fixer
[![Total Downloads](https://poser.pugx.org/jackiedo/artisan-php-cs-fixer/downloads)](https://packagist.org/packages/jackiedo/artisan-php-cs-fixer)
[![Latest Stable Version](https://poser.pugx.org/jackiedo/artisan-php-cs-fixer/v/stable)](https://packagist.org/packages/jackiedo/artisan-php-cs-fixer)
[![Latest Unstable Version](https://poser.pugx.org/jackiedo/artisan-php-cs-fixer/v/unstable)](https://packagist.org/packages/jackiedo/artisan-php-cs-fixer)
[![License](https://poser.pugx.org/jackiedo/artisan-php-cs-fixer/license)](https://packagist.org/packages/jackiedo/artisan-php-cs-fixer)

> The PHP Coding Standards Fixer tool fixes most issues in your code when you want to follow the PHP coding standards as defined in the PSR-1 and PSR-2 documents and many more.

> If you are already using a linter to identify coding standards problems in your code, you know that fixing them by hand is tedious, especially on large projects. This tool does not only detect them, but also fixes them for you.

These are introductions from authors who created PHP-CS-Fixer and this package is a [PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) bridge for use via Artisan CLI on Laravel. From now on, you can easily use PHP-CS-Fixer differently for each Laravel project with your team instead of installing a global fixer.

# Features of this package
* Use PHP-CS-Fixer differently for each Laravel project.
* Run PHP-CS-Fixer command via Laravel Artisan CLI.
* Easily export the fixer configuration to set up or share with team.

# Overview
Look at one of the following topics to learn more about Artisan PHP CS Fixer

* [Versions and compatibility](#versions-and-compatibility)
* [Installation](#installation)
* [Usage](#usage)
    - [Get version](#get-version)
    - [Fix code](#fix-code)
    - [Describe rule or set](#describe-rule-or-set)
    - [Show README content](#show-readme-content)
* [Configuration](#configuration)
* [Exclusion of the cache file](#exclusion-of-the-cache-file)
* [License](#license)
* [PHP CS Fixer official documentation](#php-cs-fixer-official-documentation)
* [Thanks from author](#thanks-for-use)

## Versions and compatibility
Artisan PHP CS Fixer don't support Laravel 4.x. Currently, this package have following branchs compatible with Laravel 5.x:

| Branch                                                           | Laravel version  |
| ---------------------------------------------------------------- | ---------------- |
| [1.x](https://github.com/JackieDo/Artisan-PHP-CS-Fixer/tree/1.x) | 5.0 - 5.2        |
| [2.x](https://github.com/JackieDo/Artisan-PHP-CS-Fixer/tree/2.x) | 5.3 and later    |

> **Note:** This documentation is use for Laravel 5.3 and later.

## Installation
You can install this package through [Composer](https://getcomposer.org).

- First, edit your project's `composer.json` file to require `jackiedo/artisan-php-cs-fixer`. Add following line to the `require` section:
```
"jackiedo/artisan-php-cs-fixer": "2.*"
```

- Next step, we run Composer update commend from the Terminal on your project source directory:
```shell
$ composer update
```

> **Note:** Instead of performing the above two steps, you can perform faster with the command line `$ composer require jackiedo/artisan-php-cs-fixer:2.*` from Terminal

- Once install/update operation completes, the final step is add the service provider. Open `config/app.php`, and add a new item to the `providers` section:
```
'Jackiedo\ArtisanPhpCsFixer\ArtisanPhpCsFixerServiceProvider',
```

> **Note:** From Laravel 5.1, you should write as `Jackiedo\ArtisanPhpCsFixer\ArtisanPhpCsFixerServiceProvider::class,`

## Usage

#### Get version
Display PHP-CS-Fixer version installed.

Syntax:
```
$ php artisan php-cs-fixer:version
```

#### Fix code
Fix your code with PHP Coding Standards.

Syntax:
```
$ php artisan php-cs-fixer:fix [options] [path/to/dir/or/file]
```

Example:
```
// Only shows which all files in your project would have been modified, leaving your files unchanged.
$ php artisan php-cs-fixer:fix --dry-run

// Really fixes all files in your project.
$ php artisan php-cs-fixer:fix

// Only fixes all files in the `app` directory
$ php artisan php-cs-fixer:fix app

// Only fixes all files in the `app` directory with specific configuration file
$ php artisan php-cs-fixer:fix --config="path/to/config/file" app
```

#### Describe rule or set
Display description of rule or set.

Syntax:
```
$ php artisan php-cs-fixer:describe name/of/rule/or/set
```

#### Show README content
Display README content of PHP-CS-Fixer.

Syntax:
```
$ php artisan php-cs-fixer:readme
```

## Configuration
To change the configuration of the fixer with your own purpose, you need publish the configuration file with the artisan `vendor:publish` as follow:

```
$ php artisan vendor:publish --provider="Jackiedo\ArtisanPhpCsFixer\ArtisanPhpCsFixerServiceProvider"
```

This will create one file named `.php_cs` in the root directory of your project. This file is returned an instance of `PhpCsFixer\ConfigInterface` which lets you configure the rules, the files and directories that need to be analyzed. From now and then, you can share this file with all of your developing team members. The rest is you have to think of a way to always sync this file for your team.

## Exclusion of the cache file
Whenever you run the artisan `php-cs-fixer:fix` command, one file with named `.php_cs.cache` will be created at the root directory of your project. You can exclude this file by append following line into `.gitignore` file:

```
.php_cs.cache
```

## License
[MIT](LICENSE) © Jackie Do

## PHP CS Fixer official documentation
For more documentation about PHP CS Fixer, you can visit [here](https://github.com/FriendsOfPHP/PHP-CS-Fixer).

## Thanks for use
Hopefully, this package is useful to you.


