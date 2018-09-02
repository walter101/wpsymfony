<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\namespacetest\Billing\Subscription;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class namespacetestController extends Controller
{

    /**
     * @Route("/namespacetest")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){
        //die('test');
        $name = 'Walter';

        $subscription = new Subscription();
        $name = $subscription->subscribe('Walter Pothof');

        return $this->render('namespacetest/namespacetest.html.twig', array('name' => $name));
    }
}
