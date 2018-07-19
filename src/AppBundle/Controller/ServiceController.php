<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 28-5-2018
 * Time: 20:01
 */

namespace AppBundle\Controller;


class ServiceController
{

    public function allCapital($str){

        return strtoupper($str);

    }
}