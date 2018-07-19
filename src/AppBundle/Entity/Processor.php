<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 22-2-2018
 * Time: 12:57
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping;

/**
 * @Mapping\Entity
 * @Mapping\Table(name="processor")
 */
class Processor
{

    /**
     * @Mapping\Id
     * @Mapping\GeneratedValue(strategy="AUTO")
     * @Mapping\Column(type="integer")
     */
    private $id;

    /**
     * @Mapping\Column(type="string")
     */
    private $name;

    /**
     * @Mapping\Column(type="float")
     */
    private $price;

    /**
     * @Mapping\Column(type="string")
     */
    private $processor_speed;

    /**
     * @Mapping\Column(type="string")
     */
    private $processor_type;

    /**
     * @Mapping\Column(type="integer")
     */
    private $cores;

    /**
     * @Mapping\Column(type="integer")
     */
    private $socket;

    /**
     * @Mapping\Column(type="string")
     */
    private $poweruse;

    /**
     * @Mapping\Column(type="string")
     */
    private $image;

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
    public function getProcessorSpeed()
    {
        return $this->processor_speed;
    }

    /**
     * @param mixed $processor_speed
     */
    public function setProcessorSpeed($processor_speed)
    {
        $this->processor_speed = $processor_speed;
    }

    /**
     * @return mixed
     */
    public function getProcessorType()
    {
        return $this->processor_type;
    }

    /**
     * @param mixed $processor_type
     */
    public function setProcessorType($processor_type)
    {
        $this->processor_type = $processor_type;
    }

    /**
     * @return mixed
     */
    public function getCores()
    {
        return $this->cores;
    }

    /**
     * @param mixed $cores
     */
    public function setCores($cores)
    {
        $this->cores = $cores;
    }

    /**
     * @return mixed
     */
    public function getSocket()
    {
        return $this->socket;
    }

    /**
     * @param mixed $socket
     */
    public function setSocket($socket)
    {
        $this->socket = $socket;
    }

    /**
     * @return mixed
     */
    public function getPoweruse()
    {
        return $this->poweruse;
    }

    /**
     * @param mixed $poweruse
     */
    public function setPoweruse($poweruse)
    {
        $this->poweruse = $poweruse;
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

    public function __ToString(){
        return $this->name;
    }

}