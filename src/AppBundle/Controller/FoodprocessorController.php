<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 19-2-2018
 * Time: 10:03
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Foodprocessor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\FoodProcessorFormType;

class FoodprocessorController extends Controller
{

    /**
     * @Route("/foodprocessor/new")
     * @return Response
     *
     */
    public function newAction(Request $request){

        $form = $this->createForm(FoodProcessorFormType::class);

        // Process the $_POST values described in the FormType class
        $form->handleRequest($request);

        // process for is submitted and data is valid
        if($form->isSubmitted() && $form->isValid()){

            dump($form->getData());

        }



        return $this->render('foodprocessor/new.html.twig',[
            'foodprocessorForm' => $form->createView()
        ]);


//        $FoodProcessor = new foodprocessor();
//
//        $FoodProcessor->setName('Foodprocessor-1');
//        $FoodProcessor->setPrice(11.50);
//
//        $em = $this->getDoctrine()->getManager();
//
//        $em->persist($FoodProcessor);
//        $em->flush();
//
//        return new Response('Done');

    }

}