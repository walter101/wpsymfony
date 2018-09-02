<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 28-8-2018
 * Time: 09:38
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table(name="afdeling")
 */
class afdeling
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $afdelingsnaam;

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
    public function getAfdelingsnaam()
    {
        return $this->afdelingsnaam;
    }

    /**
     * @param mixed $afdelingsnaam
     */
    public function setAfdelingsnaam($afdelingsnaam)
    {
        $this->afdelingsnaam = $afdelingsnaam;
    }


}