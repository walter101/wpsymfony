<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 26-2-2018
 * Time: 10:29
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\SearchFilters;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class FrontController extends Controller
{

    /**
     * @Route("/front", name="front_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request){

        $filterArray = array();

        // Get the entity manager
        $em = $this->getDoctrine()->getManager();

        // Start session
        $session = new Session();

        // Start new SearchFilter object
        $SearchFilter = new SearchFilters();

        // Get the SearchFilterType FORM
        $filterForm = $this->createForm('AppBundle\Form\SearchFiltersType', $SearchFilter);

        // Handle the POST/GET data in and out to the form
        $filterForm->handleRequest($request);

        // Get sortingDirection form session
        $sortingDirection = $session->get('sortingDirectionDown');

        // Default sortingDirection true == arrow down, false == arrow up
        if(!isset($sortingDirection)) {
            $session->set('sortingDirectionDown', true);
        }

        // Get Sorting option from query (url
        $sortingColumn = $request->query->get('sortingColumn');

        // Toggle arrow up/down when clicked to sort on column
        if( !empty($sortingColumn) &&  ($sortingColumn == $session->get('sortingColumn')) && !$filterForm->isSubmitted()) {
            // Boolean true/false
            $session->set('sortingDirectionDown', !$session->get('sortingDirectionDown'));
        }

        // If we get a GET sortingFilter (chose sorting column)  request: save it in session
        $session->set('sortingColumn', !empty($sortingColumn) ? $sortingColumn : null);

        // If empty sortingFilter: default to 'name'
        $session->set('sortingColumn', empty($session->get('sortingColumn')) ? 'name' : $session->get('sortingColumn') );



        // Get the filter values from the filters FORM or from session
        if ($filterForm->isSubmitted() && $filterForm->isValid()) {

            // Save the searchFilters form values in session
            $session->set('filterArray', $request->request->get('search_filters'));

        }else{

            // Inject the values in the searchFilter object from session
            if(!empty($session->get('filterArray')['priceFrom'])) {
                $SearchFilter->setPriceFrom($session->get('filterArray')['priceFrom']);
            }
            if(!empty($session->get('filterArray')['priceFrom'])) {
               $SearchFilter->setPriceTo($session->get('filterArray')['priceFrom']);
            }
            $SearchFilter->setFilterMemory( $session->get('filterArray')['filterMemory'] );
            $SearchFilter->setFilterProcessor( $session->get('filterArray')['filterProcessor'] );

            // Rebuild the form with the values from session
            $filterForm = $this->createForm('AppBundle\Form\SearchFiltersType', $SearchFilter);
        }



        // Get the computer objects
        $computers = $em->getRepository('AppBundle:Computer')->findAll();;


        $computers = $em->getRepository('AppBundle:Computer')->QueryComputerByFilters($session);
        //dump($queryComputers);

        return $this->render('front/index.html.twig', [
            'filterForm' => $filterForm->createView(),
            'Computers' => $computers,
            'session' => $session,
            'sortingDirectionDown' => $session->get('sortingDirectionDown')
            ]);

    }


    /**
     * @Route("/front/kk")
     */
    public function KillCookie(){
        $session = new Session();
        $session->clear();
        die('Koekje opgegeten');
    }
}