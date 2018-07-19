<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 18-1-2018
 * Time: 19:50
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Genius;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller{


    /**
     * @Route("/genius/new/")
     */
    public function newAction(){

        $genius = new Genius();
        $genius->setName('Octopus'.rand(1, 100));
        $genius->setSubFamily('Family'.rand(1, 100));
        $genius->setSpeciesCount(rand(1, 100));
        $genius->setFunFact('Funfact: '.rand(1, 100));
        $genius->setLastUpdateAt( new \DateTime("now") );

        $em = $this->getDoctrine()->getManager();

        $em->persist($genius);
        $em->flush();

        return new Response('Done');

    }

    /**
     * @Route("genius/list", name="GeniusList")
     *
     */
    public function listAction(){

        $em = $this->getDoctrine()->getManager();

        //$genius = $em->getRepository('AppBundle:Genius')->find(2);

        $genius = $em->getRepository('AppBundle:Genius')->findAllPublishedOrderBySize();
        //echo $genius->getName().'<br>';
        //echo '<pre>'.print_r($genius, true).'</pre>';


        // Render the result in a list in a template
        return $this->render('genius/list.html.twig', array(
            'genius' => $genius,
        ));
    }

    /**
     * @Route( "/genius")
     */
    public function ShowAction(){

        // Set a funfact string
        $funfact = 'New2: Octopuses can change color of there body in just *three seconds* ';

        // Get the cache bundle ( this is a system that stores key/values )
        $cache = $this->get('doctrine_cache.providers.my_markdown_cache');

        // Create an unique md5 key
        $key = md5($funfact);

        // Check if unique key allready exists and use this key to fetch the stored data, or save data using this unique key
        if($cache->contains($key)){

            // Fetch the cached string
            $funfact =  $cache->fetch($key);
        }else {

            // Fake an delayh
            sleep(2);
            // Save the string in the cache
            $cache->save($key, $funfact);
        }


        return new Response('<html><body>The funcfact is: '.$funfact.'</body></html>');

    }

    /**
     * @Route("/lucky/{number}")
     */
    public function luckyNumberAction($number){


        //$log = $this->container->get('logger');
        //echo '<prE>'.print_r((get_class_methods($log)), true).'</prE>';
        return $this->render('genius/show.html.twig', array(
            'name' => $number,
        ));
    }
}