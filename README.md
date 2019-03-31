# Create an autoloader in PHP


<div align="center" >
<img src="https://farm8.staticflickr.com/7816/47298924232_064d4ff498_h.jpg" width=100% />
</div>


```
***** FILE STRUCTURE *****

src/
  App/
    Main.php 
	NewNamespace/
		Main.php   
composer.json
index.php
```
## composer.json
```json
{

}
```

> run composer install

This will generate a series of autoload files.

## Add to composer.json file
```json
{
"autoload": {
		"psr-4": {
			"App\\": "src/App",
			"App\\NewNamespace\\": "src/App/NewNamespace"
		}
	}
}

```

This represents the autoloader type "psr-4" plus the key is the namespace and the value is the src/App folder. Here it will autoload all the namespace App files.

> run composer dump-autoload

This will generate the autoloader files needed for this to work. Then in index.php :

## index.php
```php
<?php

require __DIR__ . '/vendor/autoload.php';

new App\Main;
new App\NewNamespace\Main;

```

Here we import the autoloader file so we can import all the namespace App classes. Here we then new up the class Main within the namespace App.

## Each time a new namespace autoloader is added to composer.json you are required to again `run composer dump-autoload` again so these changes can be installed.  