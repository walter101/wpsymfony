<?php

namespace AppBundle\MyService\markup;

class markupService
{

    public function ToUpper($str){
        return strtoupper($str);
    }

    public function ToBold($str){
        return '<b>'.$str.'</b>';
    }


}