<?php
namespace tests\Unit;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class Config_Helpers_Env_Function_Test extends TestCase
{


    public function setUp():void
    {
        $_ENV['APP_NAME'] = 'Test Name';
        $_ENV['APP_TEST'] = 'test';
        $_ENV['APP_DEBUG'] = false;
    }


 /**
 * @test
 * Ensure Environmental Variable is loaded if available
 *
 * @return void
 */

    public function getsTheSetEnvironmentVariable()
    {
        $this->assertEquals('Test Name', env('APP_NAME', 'Default Name'));
    }

 /**
 * @test
 * Ensure Default Configuration Variable is loaded if Environment
 * variable not set
 *
 * @return void
 */
    public function getsTheDefaultEnvironmentVariable()
    {
        
        $this->assertEquals('Default Name', env('APP_FAKE', 'Default Name'));
    }

/**
 * @test
 * Ensure Default Configuration Variable is loaded if Environment
 * variable not set
 *
 * @return void
 */
    public function getsTheSetEnvironmentVariableIfABoolean()
    {

        $this->assertEquals(false, env('APP_DEBUG', 'Default Name'));
    }

/** @test */

    public function getsTheDefaultEnvironmentVariableIfABoolean()
    {

        $this->assertEquals(false, env('APP_FAKE', false));
    }


/**
 * @test
 * @function env
 * Ensure environment key is not an emptyt string
 *
 * @return void
 */
    public function throwsExceptionIfEnvironmentKeyIsEmptyString()
    {
        $this->expectException(InvalidArgumentException::class);
        env('', 'local');
    }

        /**
 * @test
 * Ensure environment key and default are not empty strings
 *
 * @return void
 */
    public function throwsExceptionIfDefaultAndEnvironmentValuesAreBothEmptyStrings()
    {
        $this->expectException(InvalidArgumentException::class);
        env('', '');
    }


    /**
 * @test
 * Throws an error if no values are passed to env function
 *
 * @return void
 */
    public function throwsExceptionIfNoValuesArePassed()
    {
        $this->expectException(InvalidArgumentException::class);
        env();
    }
}
