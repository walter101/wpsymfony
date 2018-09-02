<?php
namespace test\testclasses;

class CityClass
{

    // Set property with default value
    public $cityname = "Doetinchem";

    // Return the current value for $this->cityname
    public function getCityname(){
        return  $this->cityname;
    }

    // Set new value for $this->cityname
    public function setCityname($cityname){

        $this->cityname = $cityname;
    }

    // Some useless testfunction
    public function uselesstest(){
    $x=10;
    return $x;
}
}