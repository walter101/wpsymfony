<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 26-2-2018
 * Time: 10:36
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="search_filters")
 */
class SearchFilters
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $priceFrom;

    /**
     * @Assert\Range(
     * min = 100,
     * max = 200,
     * minMessage ="Vul minimaal 100 in.",
     * maxMessage ="Vul maximaal 200 in."
     * )
     * @ORM\Column(type="integer", nullable=true)
     */
    private $priceTo;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Processor")
     */
    private $filterProcessor;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MemoryList")
     */
    private $filterMemory;



    public function __construct(){
        $this->filterMemory = new ArrayCollection();
        $this->filterProcessor = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getFilterProcessor()
    {
        return $this->filterProcessor;
    }

    /**
     * @param mixed $filterProcessor
     */
    public function setFilterProcessor($filterProcessor)
    {
        $this->filterProcessor = $filterProcessor;
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
    public function getFilterMemory()
    {
        return $this->filterMemory;
    }

    /**
     * @param mixed $filterMemory
     */
    public function setFilterMemory($filterMemory)
    {
        $this->filterMemory = $filterMemory;
    }

    /**
     * @return mixed
     */
    public function getPriceFrom()
    {
        return $this->priceFrom;
    }

    /**
     * @param mixed $priceFrom
     */
    public function setPriceFrom($priceFrom)
    {
        $this->priceFrom = $priceFrom;
    }

    /**
     * @return mixed
     */
    public function getPriceTo()
    {
        return $this->priceTo;
    }

    /**
     * @param mixed $priceTo
     */
    public function setPriceTo($priceTo)
    {
        $this->priceTo = $priceTo;
    }


}