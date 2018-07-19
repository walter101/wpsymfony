<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 25-2-2018
 * Time: 08:01
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class pc  extends Controller
{

    /**
     *
     * @Route("/pc")
     */
    public function showAction(){

        return new Response('pc');

    }

}