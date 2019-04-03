<?php
namespace tests\Unit;

use stdClass;
use TypeError;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class Config_Helpers_Config_Function_Test extends TestCase
{
    public function setUp():void
    {
        $_ENV['APP_NAME'] = 'Test Name';
        $_ENV['APP_ENV'] = 'test';
    }


    /**
 * @test
 * Ensure Environmental Variable is loaded if available
 *
 * @return void
 */

    public function getsAValueIfOneElementInArray()
    {
        $array = [
            'name' => env('APP_NAME', 'Laravel'),
            'env' => env('APP_ENV', 'production')
        ];
      
        $this->assertEquals('Test Name', Config($array, 'name'));
    }

    /**
     * Gets a value if multiple elements are in the array
     * @test
     * @return void
     */
    public function getsAValueIfMultipleElementInArray()
    {
        $array = [
            'name' => env('APP_NAME', 'Laravel'),
            'env' => env('APP_ENV', 'production')
        ];
           
        $this->assertEquals('test', Config($array, 'env'));
    }

     /**
     * Throws an exception if no key(second argument to config method)
     * value can't be found
     * @test
     * @return void
     */
    public function throwsExceptionIfNoValueInArray()
    {
        $array = [
            'name' => env('APP_NAME', 'Laravel'),
            'env' => env('APP_ENV', 'production')
        ];
        $this->expectException(InvalidArgumentException::class);
        $this->assertEquals('test', Config($array, 'novalue'));
    }

     /**
     * Can return a boolean value without throwing exception
     * @test
     * @return void
     */
    public function canReturnABooleanValueWithoutThrowingAnError()
    {
        $array = [
            'name' => env('APP_NAME', 'Laravel'),
            'env' => env('APP_ENV', 'production'),
            'debug' => env('APP_DEBUG', false)
        ];
        
        $this->assertEquals(false, Config($array, 'debug'));
    }

   /**
    * If first argument to config method is `Not` an array
    * it will throw an error
    * @test
    * @return void
    */
    public function ifAnArrayIsNotPassedItWillThrow()
    {
        $bool = true;
        $string = "12345";
        $int = 12345;
        $obj = new stdClass();

        
        $this->expectException(TypeError::class);
        $this->assertEquals('test', Config($bool, 'novalue'));
        $this->assertEquals('test', Config($string, 'novalue'));
        $this->assertEquals('test', Config($int, 'novalue'));
        $this->assertEquals('test', Config($obj, 'novalue'));
    }
}
