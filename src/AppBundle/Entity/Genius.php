<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GeniusRepository")
 * @ORM\Table(name="genius")
 */
class Genius extends Controller
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $subFamily;

    /**
     * @ORM\Column(type="integer")
     */
    private $speciesCount;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $funFact;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $LastUpdateAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished;

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }

    /**
     * @return mixed
     */
    public function getLastUpdateAt()
    {
        return $this->LastUpdateAt;
    }

    /**
     * @param mixed $LastUpdateAt
     */
    public function setLastUpdateAt($LastUpdateAt)
    {
        $this->LastUpdateAt = $LastUpdateAt;
    }



    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSubFamily()
    {
        return $this->subFamily;
    }

    /**
     * @param string $subFamily
     */
    public function setSubFamily($subFamily)
    {
        $this->subFamily = $subFamily;
    }

    /**
     * @return integer
     */
    public function getSpeciesCount()
    {
        return $this->speciesCount;
    }

    /**
     * @param integer $specieCount
     */
    public function setSpeciesCount($speciesCount)
    {
        $this->speciesCount = $speciesCount;
    }

    /**
     * @return string
     */
    public function getFunFact()
    {
        return $this->funFact;
    }

    /**
     * @param string $funFact
     */
    public function setFunFact($funFact)
    {
        $this->funFact = $funFact;
    }


//    public function __toString(){
//        return $this->LastUpdateAt();
//    }

}