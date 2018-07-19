<?php

namespace AppBundle\Controller\auto;

//use Doctrine\ORM\Mapping as ORM;

use AppBundle\MyService\auto\autoSpecificaties;
use AppBundle\MyService\markup\markupService;
use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class auto extends Controller{

    /**
     * @ORM\Column(type="string")
     */
    private $wielen;

    /**
     * @ORM\Column(type="string")
     */
    private $deuren;

    /**
     * @ORM\Column(type="string")
     */
    private $kleur;

    /**
     * @return mixed
     */
    public function getWielen()
    {
        return $this->wielen;
    }

    /**
     * @param mixed $wielen
     */
    public function setWielen($wielen)
    {
        $this->wielen = $wielen;
    }

    /**
     * @return mixed
     */
    public function getDeuren()
    {
        return $this->deuren;
    }

    /**
     * @param mixed $deuren
     */
    public function setDeuren($deuren)
    {
        $this->deuren = $deuren;
    }

    /**
     * @return mixed
     */
    public function getKleur()
    {
        return $this->kleur;
    }

    /**
     * @param mixed $kleur
     */
    public function setKleur($kleur)
    {
        $this->kleur = $kleur;
    }


    /**
     * @Route("/auto", name="showauto")
     * @return mixed
     */
    public function showAutoAction(){

        $markupService = new markupService();

        $autoService = new autoSpecificaties($markupService);

        $auto = $autoService->getCarSpecifications();

        return $this->render('auto/auto.html.twig', array('auto'=> $auto));
    }


    /**
     * TEST 2: Gebruik 2 services die je ter plekke in de controleer instatieerd
     *
     */

    /**
     * @Route("/autoService", name="showautoService")
     * @return mixed
     */
    public function showAutoServiceAction(){

        $markupService = new markupService();

        $autoService = new autoSpecificaties($markupService);
        $auto = $autoService->getCarSpecifications();


        return $this->render('auto/auto.html.twig', array('auto'=> $auto, 'afleverplaats' => $markupService->ToUpper('Doetinchem') ));
    }


    /*
     * TEST 3 gebruik een service in een service
     *
     */

    /**
     * @Route("showAutoServiceInService", name="showAutoServiceInService")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAutoServiceInServiceAction(){

        $markupService = new markupService();

        $autoService = new autoSpecificaties($markupService);
        $auto = $autoService->getCarSpecifications();


        return $this->render('auto/auto.html.twig', array('auto'=> $auto, 'afleverplaats' => $markupService->ToUpper('Doetinchem') ));
    }


}