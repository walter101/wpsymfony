<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 28-8-2018
 * Time: 09:22
 */

namespace test\unittests;

use test\testclasses\werknemer;
require_once('test\testclasses\werknemer.php');

class werknemerTest extends \PHPUnit\Framework\TestCase
{

    /**
     *
     */
    public function testOphalenWerknemer(){

        $werknemerMock = $this->getMockBuilder(werknemer::class)
            ->setMethods(null)
            ->getMock();

        echo 'De methods in mock Werknemer'.PHP_EOL;
        print_r(get_class_methods($werknemerMock));

        $werknemerMock->testWerknemer();
    }
}