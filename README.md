# PHP Starter Kit

<div align="center" >
<img src="https://farm8.staticflickr.com/7875/46804742184_e2462eb24c_o.png" width=100% />
</div>

```php
> Git clone project
> cd into folder root
> composer install
> composer dump-autoload

> php index.php to core php run server

***alternatively load into php server such as xamp/wamp***
```

A `Kit` to start any new php project

## Includes

>Composer psr-4 autoloader

>Namespaces

>PHPUnit Testing Framework Intergration

>PHPUnit.xml configuration

>File autoloads

>Core App Default Configuration file

> PHP DotEnv - environment Variables


## Testing cli suite

> ./vendor/bin/phpunit --testdox

## Testing cli individual function

> ./vendor/bin/phpunit --testdox --filter `<functionNameHere>`


# API

## Methods

### `env($global_key, $default_key)` - retrieves set Environment Variable or default set configuration value.

 * Global method availabilty
 *  Function returns an Global environment Value if global_key found
 *  or its default configuration value as set in second argument.
 *  @params string | boolean | null $default_key
 *  @params string $global_key *
 *  @returns string | InvalidArgumentException

 ### `Config(array $configArray, string $configKey)` - takes the config array and configuration key and returns configuration value.

  * Returns an enviroment Variable if that key is found or
 * a default value as set in configuration file.
 * @throws InvalidArgumentException
 * @param Array $configArray [Mixed Associative Array]
 * @param string $configKey [Configuration Key Value to look for]
 * @return string|boolean|null


 # Autoloader configuration and extension 
 
 ## [Autoloader configuration and extension link](https://github.com/jwill9999/autoloader_php_setup)

<hr>
 
 
## Each time a new namespace autoloader is added to composer.json you are required to again `run composer dump-autoload` again so these changes can be installed.  