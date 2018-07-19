<?php

namespace AppBundle\MyService\auto;

class autoSpecificaties
{

    private $markupService;
    private $wielen;
    private $deuren;
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

    public function __construct($markupService){

        $this->markupService = $markupService;

        $this->setDeuren(6);
        $this->setKleur('zwart');
        $this->setWielen(4);
    }

    public function getCarSpecifications(){

        return array(
            'wielen' => $this->getWielen(),
            'deuren' => $this->getDeuren(),
            'kleur'  => $this->markupService->ToUpper($this->getKleur())
        );

    }

}