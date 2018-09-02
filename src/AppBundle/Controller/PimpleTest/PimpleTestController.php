<?php

namespace AppBundle\Controller\PimpleTest;

use FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PimpleTestController extends Controller
{

    /**
     * @Route("/pimpletest/")
     */
    public function pimpletest(){

        // Haal de pimpel config file
        $dir = $this->get('kernel')->getRootDir();
        $link = str_replace('\\', '/', $dir).'/config/pimpleContainer.php';
        include_once $link;

        $container['test'] = 'testerdetest';
        // Use the container
        /** @var \Pimple */
        echo $container['test'].'<br>';

        echo $container['pimpleclassCity']->returnCity().'<Br>';

        echo $container[\AppBundle\walter\pimpleclassZipcode::class]->returnZicode();

        die('stop, dit is een pimple test om te kijken of ik de container kan gebruiken');
    }
}