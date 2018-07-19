<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 21-2-2018
 * Time: 10:59
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComputerRepository")
 * @ORM\Table(name="computer")
 */
class Computer
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
     * @ORM\Column(type="float")
     */
    private $price;



    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GraphicCard")
     */
    public $graphicCard;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MainBoard", fetch="EAGER")
     */
    public $mainBoard;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\MemoryList")
     */
    public $memory;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Processor")
     */
    public $processor;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ColorList")
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\OperatingSystemList")
     */
    private $operatingSystemList;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\housingList")
     */
    private $housingList;


    /**
     * You need to set ArrayCollection on the relation reference variable
     */
    public function __construct()
    {
        $this->graphicCard = new ArrayCollection();
        $this->memory = new ArrayCollection();
        $this->mainBoard = new ArrayCollection();
        $this->processor = new ArrayCollection();
        $this->color = new ArrayCollection();
        $this->operatingSystemList = new ArrayCollection();
        $this->housingList = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getHousingList()
    {
        return $this->housingList;
    }

    /**
     * @param mixed $housingList
     */
    public function setHousingList(housingList $housingList)
    {
        $this->housingList = $housingList;
    }

    /**
     * @return mixed
     */
    public function getOperatingSystemList()
    {
        return $this->operatingSystemList;
    }

    /**
     * @param mixed $operatingSystemList
     */
    public function setOperatingSystemList(OperatingSystemList $operatingSystemList)
    {
        $this->operatingSystemList = $operatingSystemList;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor(ColorList $color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getProcessor()
    {
        return $this->processor;
    }

    /**
     * @param mixed $processor
     */
    public function setProcessor(Processor $processor)
    {
        $this->processor = $processor;
    }

    /**
     * @return mixed
     */
    public function getMainBoard()
    {
        return $this->mainBoard;
    }

    /**
     * @param mixed $mainBoard
     */
    public function setMainBoard(MainBoard $mainBoard)
    {
        $this->mainBoard = $mainBoard;
    }

    /**
     * @return mixed
     */
    public function getMemory()
    {
        return $this->memory;
    }

    /**
     * @param mixed $memory
     */
    public function setMemory(MemoryList $memory)
    {
        $this->memory = $memory;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getGraphicCard()
    {
        return $this->graphicCard;
    }

    /**
     * @param mixed $graphicCard
     */
    public function setGraphicCard(GraphicCard $graphicCard)
    {
        $this->graphicCard = $graphicCard;
    }


    public function getValue(){

        return 'Dit is een test';

    }


    // Ik ga een relatie maken met de entity graphicCard
    // Een computer heeft 1 grafische kaart
    // ManyToOne betekend many grafische kaarten kunnen naar One computer object verwijzen
    //
}