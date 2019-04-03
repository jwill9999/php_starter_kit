<?php 

namespace App\config;

/**
 *  Gets the configuration file.
 *  @params array $config
 *  @returns array
 */
 
class Configuration
{
    private $value;

    public function __construct($config)
    {
        $this->value = $config;
    }

    public function __get($value) : array
    {
        return $this->$value;
    }
}
