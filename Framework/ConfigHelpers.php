<?php






function env($global_key = '', $default_key= '')
{
    
    if (strlen($global_key) && strlen($default_key)) {
        if (isset($_ENV[$global_key])) {
            return $_ENV[$global_key];
        } else {
            return $default_key;
        }
    } else {
        throw new InvalidArgumentException('Please enter a deafault values');
    }
}

// /**
//  * Undocumented function
//  *
//  * @param [dynamic] $configArray
//  * @param [string] $vconfigKey
//  * @return void
//  */
function Config($configArray, $configKey)
{
    try {
        foreach ($configArray as $key => $value) {
            var_dump($configArray);
            if ($key == $value) {
                return $value;
            } else {
                    throw new Exception('Unable to find Configuration value ' . $configKey);
            };
        };
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function BootstrapConfiguration()
{
    return  require dirname(__DIR__) . '\App\config\App.php';
}

function BootstrapCoreApplication()
{
     return new App\Index;
}
