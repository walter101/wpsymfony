<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 29-5-2018
 * Time: 18:11
 */

namespace AppBundle\MyService;


class RandomCityService
{

    private $cities = array('Amsterdam', 'Doetinchem', 'Utecht', 'Hengelo', 'Rotterdam', 'Den Haag' );

    private $inject;

    public function __construct(TextMarkupService $textMarkupService){
        $this->inject = $textMarkupService;
    }

    public function returnRandomCityname(){

        $number = rand(0, 5);
        return $this->cities[$number];
    }

    public function returnRandomCitynameUpper(){

        $number = rand(0, 5);
        return $this->inject->toUpper($this->cities[$number]);
    }

}