<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 19-7-2018
 * Time: 07:16
 */

namespace AppBundle\Controller\servicetester;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class servicetester extends Controller
{

    /**
     * @Route("/servicetester", name="servicetest")
     * @return mixed
     */
    public function showTesterAction(){

        $service = $this->get('app.servicetester');

        $variable = [1=> 10, 'two' => 'twee', 'string'=> $service->test()];


        return $this->render('/servicetester/servicetester.html.twig', ['variable'=>$variable]);

    }

}