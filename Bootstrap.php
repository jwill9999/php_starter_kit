<?php


// setup autoloader
require __DIR__ . '/vendor/autoload.php';

// create and setup .env files
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

// configuration bootstrapping
$app = BootstrapConfiguration();

$core = BootstrapCoreApplication();

$value = env('NO_VALUE', '');
