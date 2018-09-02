<?php
namespace test\unittests;

class firstTest extends \PHPUnit_Framework_TestCase
{

    public function testMyFirst(){

        $test = true;
        $this->assertTrue($test, 'dit is true');
    }

    public function testCompareValues(){

        $expected = 10;
        $result = 10;

        $this->assertEquals($expected, $result, 'expected en result zijn gelijk');
    }

    public function testCompareValuesFail(){

        $expected = 10;
        $result = 10;

        $this->assertEquals($expected, $result, 'expected en result zijn NIET gelijk');
    }

}
