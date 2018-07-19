<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 22-2-2018
 * Time: 13:50
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="housing_list")
 */
class housingList
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ColorList")
     */
    private $color;

    /**
     * @ORM\Column(type="string")
     */
    private $shape;

    /**
     * @Assert\NotBlank(message="Let op: Deze waarde mag niet leeg of 0 zijn.")
     * @Assert\Length( min = 2, minMessage="Moet minimaal {{ limit }} char lang zijn.")
     * @ORM\Column(type="string")
     */
    private $lenght;

    /**
     * @ORM\Column(type="string")
     */
    private $height;

    /**
     * @ORM\Column(type="string")
     */
    private $width;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    public function __construct(){
        $this->color = new ArrayCollection();
    }

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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getShape()
    {
        return $this->shape;
    }

    /**
     * @param mixed $shape
     */
    public function setShape($shape)
    {
        $this->shape = $shape;
    }

    /**
     * @return mixed
     */
    public function getLenght()
    {
        return $this->lenght;
    }

    /**
     * @param mixed $lenght
     */
    public function setLenght($lenght)
    {
        $this->lenght = $lenght;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
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