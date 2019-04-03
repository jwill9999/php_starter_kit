<?php

use App\config\Configuration;




/**
 *  Function returns an Global environment Value if global_key found
 *  or its default configuration value as set in second argument.
 *  @params string | boolean | null $default_key
 *  @params string $global_key *
 *  @returns string | InvalidArgumentException
 */
function env(string $global_key = '', $default_key = '')
{
    if (isset($global_key) && strlen($global_key)) {
        if (is_string($default_key) || is_bool($default_key) || is_null($default_key)) {
            if (isset($_ENV[$global_key])) {
                return $_ENV[$global_key];
            } else {
                return $default_key;
            }
        } else {
            throw new InvalidArgumentException('Please enter a default values');
        }
    } else {
        throw new InvalidArgumentException('Please enter a default values');
    }
}

/**
 * Returns an enviroment Variable if that key is found or
 * a default value as set in configuration file.
 * @throws InvalidArgumentException
 * @param Array $configArray [Mixed Associative Array]
 * @param string $configKey [Configuration Key Value to look for]
 * @return string|boolean|null
 */
function Config(array $configArray, string $configKey)
{
    foreach ($configArray as $key => $value) {
        if ($key == $configKey) {
            return $value;
        }
    }
    throw new InvalidArgumentException('Please enter a valid value');
}

/**
 * Gets the Core App configuration file
 * @param filepath require configuration file
 * @return array
 */
function AppConfiguration()
{      
   $configuration = new Configuration(require dirname(__DIR__) . '\App\config\App.php');
   return $configuration->value; 
    
}

function BootstrapCoreApplication()
{
    return new App\Index;
}
