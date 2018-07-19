<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Computer;
use AppBundle\MyService\MyServiceClass;
use AppBundle\MyService\RandomCityService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Cache\Adapter\TraceableAdapter;

class TestController extends Controller
{

    public $serviceController;

    public function __construct(ServiceController $serviceController){
        $this->testservice = $serviceController;
    }


    /**
     * @Route("/testservice/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function testserviceAction(){

        $cityservice = $this->get('app.RandomCity');
        $testService = $this->get('app.mytestservice');

        $content = array(
          'value' => 'mijn test value',
            'string' => $testService->allCapital(' maak hier allemaal hoofdletters van.'),
            'city' => $cityservice->returnRandomCityname(),
            'cityUP' => $cityservice->returnRandomCitynameUpper(),

        );

        return $this->render('test/service.html.twig', array(
            'content' => $content,
        ));

    }


    /**
     * @Route("/test/")
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $Computer = $em->getRepository(Computer::class)->findAll();
        dump($Computer);
        //dump($Computer[4]->getGraphicCard()->get);

        //$Computer->getgetPowerUse();

        //die();

        return $this->render('test/index.html.twig', array('computer' => $Computer));
    }

    /**
     * @Route("/test/find/{id}")
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findOneAction($id)
    {
        //$id=10;

        $em = $this->getDoctrine()->getManager();

        $Computer = $em->getRepository(Computer::class)->find($id);
        dump($Computer);
        //dump($Computer[4]->getGraphicCard()->get);

        //$Computer->getgetPowerUse();

        //die();

        return $this->render('test/findone.html.twig', array('computer' => $Computer));
    }


}
