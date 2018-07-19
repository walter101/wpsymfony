<?php

namespace AppBundle\MyService;

use Doctrine\ORM\Mapping as ORM;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints\DateTime;

class MyServiceClass
{

    /**
     * @var
     */
    private $service;

//    public function __construct($service){
//
//        $this->service = $service;
//    }

    /**
     * @param $str
     * @return mixed
     */
    public function MySuperService($str)
    {

        // Use the TypeTwice method from the service object which was injected into this class in a private property
        return $this->service->TypeTwice($str);

    }



}