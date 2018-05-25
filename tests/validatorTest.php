<?php
namespace PHP\tests;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHP\includes\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function setup()
    {
        $this->Validator= new Validator();
    }
    public function teardown()
    {
        unset($this->Validator);
    }

    /**
* @dataProvider providename
*/

    public function testname($items, $expected)
    {
        $output= $this->Validator->name($items);
        $this->assertEquals(
            $expected,
            $output,
            'Please check your input'
        );
    }
    public function providename()
    {
        return [
        ["sunny Ramrakhiani", true],
        ["Sunny Ramrakhiani", true],
        ["sunny1 Ramrakhiani", false],
        ["sunny1Ramrakhiani", false]
        ];
    }
    
    /**
* @dataProvider providephone
*/

    public function testphone($items, $expected)
    {
        $output= $this->Validator->phone($items);
        $this->assertEquals(
            $expected,
            $output,
            'Please check your input'
        );
    }

    public function providephone()
    {
        return [
        ["7507827899", true],
        ["750782789", false],
        ["asdasdadad", false],
        ["abcaca", false]
        ];
    }

    /**
* @dataProvider provideemail
*/
    public function testemail($items, $expected)
    {
        $output= $this->Validator->email($items);
        $this->assertEquals(
            $expected,
            $output,
            'Please check your input'
        );
    }

    public function provideemail()
    {
        return [
        ['sunny.ramrakhiani@wisdmlabs.com', true],
        ['sunnysideshswarappa@wisdmlabs.com', true],
        ['sunny@gmailcom', false],
        ['sunnygmail.com', false]
        ];
    }

    /**
* @dataProvider provideusername
*/
    public function testusername($items, $expected)
    {
        $output= $this->Validator->username($items);
        $this->assertEquals(
            $expected,
            $output,
            'Please check your input'
        );
    }

    public function provideusername()
    {
        return [
        ['sunny12', true],
        ['sunny_12', true],
        ['sunny.12', false],
        ['sunny 12', false],
        ];
    }

    /**
* @dataProvider providepassword
*/

    public function testpassword($items, $expected)
    {
        $output= $this->Validator->password($items);
        $this->assertEquals(
            $expected,
            $output,
            'Please check your input'
        );
    }

    public function providepassword()
    {
        return [
        ['sunny@12', true],
        ['sunny', false],
        ['sunny12', false],
        ['sunny@', false]
        ];
    }

    /**
* @dataProvider provideconfirmpassword
*/

    public function testconfirmpassword($item1, $item2, $expected)
    {
        $output= $this->Validator->confirmpassword($item1, $item2);
        $this->assertEquals(
            $expected,
            $output,
            'Please check your input'
        );
    }

    public function provideconfirmpassword()
    {
        return [
        ['sunny@12', 'sunny@12', true],
        ['sunny@1', 'sunny@12', false],
        ['sunny@12', 'sunny@2', false]
        ];
    }
}
