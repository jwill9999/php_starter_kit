<?php
namespace tests\Unit;

use PHPUnit\Framework\TestCase;

class GetConfigValueTest extends TestCase
{


    public function setUp():void
    {
        $_ENV['APP_NAME'] = 'Test Name';
        $_ENV['APP_TEST'] = 'test';
    }


 /**
 * @test
 * Ensure Environmental Variable is loaded if available
 *
 * @return void
 */

    public function envFunctionGetsTheSetEnvironmentVariable()
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
    public function envFunctionGetsTheDefaultEnvironmentVariable()
    {
        
        $this->assertEquals('Default Name', env('APP_ENV', 'Default Name'));
    }

 /**
 * @test
 * Ensure Default Configuration key is set
 *
 * @return void
 */
    public function envFunctionThrowsExceptionIfDefaultKeyIsEmptyString()
    {
        $this->expectException(\InvalidArgumentException::class);
        env('APP_TEST', '');
    }

    /**
 * @test
 * @function env
 * Ensure environment key is not an emptyt string
 *
 * @return void
 */
    public function envFunctionThrowsExceptionIfEnvironmentKeyIsEmptyString()
    {
        $this->expectException(\InvalidArgumentException::class);
        env('', 'local');
    }

        /**
 * @test
 * Ensure environment key and default are not empty strings
 *
 * @return void
 */
    public function envFunctionThrowsExceptionIfDefaultAndEnvironmentValuesAreBothEmptyStrings()
    {
        $this->expectException(\InvalidArgumentException::class);
        env('', '');
    }


    /**
 * @test
 * Throws an error if no values are passed to env function
 *
 * @return void
 */
    public function envFunctionThrowsExceptionIfNoValuesArePassed()
    {
        $this->expectException(\InvalidArgumentException::class);
        env();
    }
}
