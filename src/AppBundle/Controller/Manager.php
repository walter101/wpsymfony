<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 22-2-2018
 * Time: 14:59
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Manager extends Controller
{

    /**
     * @Route("/manager")
     */
    public function indexAction(){

        return $this->render('/manager/manager.html.twig');

    }

}