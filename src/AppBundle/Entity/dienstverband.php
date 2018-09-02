<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 28-8-2018
 * Time: 09:34
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table(name="dienstverband")
 */
class dienstverband
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $werknemer_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $afdeling_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getWerknemerId()
    {
        return $this->werknemer_id;
    }

    /**
     * @param mixed $werknemer_id
     */
    public function setWerknemerId($werknemer_id)
    {
        $this->werknemer_id = $werknemer_id;
    }

    /**
     * @return mixed
     */
    public function getAfdelingId()
    {
        return $this->afdeling_id;
    }

    /**
     * @param mixed $afdeling_id
     */
    public function setAfdelingId($afdeling_id)
    {
        $this->afdeling_id = $afdeling_id;
    }



}