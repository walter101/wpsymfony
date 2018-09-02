<?php
namespace test\unittest;

use test\testclasses\CityClass;

// Because the autloader dont load my classes i need to manualy require them AND use them
use test\testclasses\GewoonEenClass;
require_once('test/testclasses/GewoonEenClass.php');

class CityClassTest extends \PHPUnit_Framework_TestCase{

    private $CityClassMock;

    /** @var  \test\testclasses\CalculatorClass $calculator */
    private $calculator;

    private $GewoonEenClass;

    protected function setUp(){

        // Ik kan een normale class mocken
        $this->calculator = $this->getMockBuilder(newCalculatorClass::class)
            ->setMethods(null)
            ->getMock();

        // Instantieer een gewone class
        $this->GewoonEenClass = new GewoonEenClass();

    }
    public function testCityClass(){

        print_r(get_class_methods($this->GewoonEenClass));
        echo $this->GewoonEenClass->doemijdiemaar().PHP_EOL;

        // Create mock object where all methodes are mock method and only one stub method: uselesstest
        $this->CityClassMock = $this->getMockBuilder('test\testclasses\CityClass')
            ->setMethods(array('uselesstest'))
            ->getMock();

        // Check the actual methodes in the mocked object
        print_r(get_class_methods($this->CityClassMock));
        /**
         * Waarom zie ik alleen de stub methode uselesstest tussen de available methodes staan?
         * Ik had verwacht dat getCityname en setCityname er ook zouden zijn
         * en dat die twee ontbrekende methodes de inhoud van de orgine class (mocked) hadden?
         */

        // Try to use an stub method
        if(null == $this->CityClassMock->uselesstest()){
            echo "The sub method 'uselesstest' returned null as result";
        }

        /**
         * Ik kan de stub class gebruiken en de content: return null overschrijven
         * om zo de method te laten returnen wat ik wil:
         */
        $this->CityClassMock
            ->expects($this->any())
            ->method('uselesstest')
            ->willReturn('Dit is mijn result');

        $this->CityClassMock->uselesstest();
        //$this->assert
        //var_dump($newResult);

        // Ik kan echter niet de string ophalen die ik als result heb gezet?
        //Dat is namelijk een protected value in de var_dump()
        //echo $newResult;





        $expected = "Doetinchem";

        //$this->assertSame($expected, $result, 'Expected string wijkt af van result');

    }
}