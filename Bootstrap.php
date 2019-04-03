<?php

use App\config\Configuration;




// setup autoloader
require __DIR__ . '/vendor/autoload.php';

// create and setup .env files
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

// configuration bootstrapping
$app = AppConfiguration();


$core = BootstrapCoreApplication();

echo(config($app, 'env'));
