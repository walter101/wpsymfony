<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 20-2-2018
 * Time: 14:52
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="graphic_card")
 */
class GraphicCard extends Controller
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
     * @Assert\Type("integer")
     * @ORM\Column(type="integer")
     */
    private $slots;

    /**
     * @Assert\Length(
     * min= 2,
     * max= 10,
     * minMessage="Moet minimaal 2 chars zijn.",
     * maxMessage="Mag max 10 char zijn"
     * )
     * @ORM\Column(type="string", nullable=true)
     */
    private $memory;


    /**
     * @Assert\Length(
     * min= 3,
     * max= 5,
     * minMessage="Moet minimaal 3 chars zijn.",
     * maxMessage="Mag max 5 char zijn"
     * )
     * @ORM\Column(type="string")
     */
    private $memoryType;

    /**
     * @ORM\Column(type="string")
     */
    private $memoryInterfact;

    /**
     * @ORM\Column(type="string")
     */
    private $memorySpeed;

    /**
     * @ORM\Column(type="string")
     */
    private $clockSpeed;

    /**
     * @ORM\Column(type="string")
     */
    private $dvi;

    /**
     * @ORM\Column(type="string")
     */
    private $hdmi;

    /**
     * @ORM\Column(type="string")
     */
    private $powerUse;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $status = 1;

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
    public function getSlots()
    {
        return $this->slots;
    }

    /**
     * @param mixed $slots
     */
    public function setSlots($slots)
    {
        $this->slots = $slots;
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
    public function setMemory($memory)
    {
        $this->memory = $memory;
    }

    /**
     * @return mixed
     */
    public function getMemoryType()
    {
        return $this->memoryType;
    }

    /**
     * @param mixed $memoryType
     */
    public function setMemoryType($memoryType)
    {
        $this->memoryType = $memoryType;
    }

    /**
     * @return mixed
     */
    public function getMemoryInterfact()
    {
        return $this->memoryInterfact;
    }

    /**
     * @param mixed $memoryInterfact
     */
    public function setMemoryInterfact($memoryInterfact)
    {
        $this->memoryInterfact = $memoryInterfact;
    }

    /**
     * @return mixed
     */
    public function getMemorySpeed()
    {
        return $this->memorySpeed;
    }

    /**
     * @param mixed $memorySpeed
     */
    public function setMemorySpeed($memorySpeed)
    {
        $this->memorySpeed = $memorySpeed;
    }

    /**
     * @return mixed
     */
    public function getClockSpeed()
    {
        return $this->clockSpeed;
    }

    /**
     * @param mixed $clockSpeed
     */
    public function setClockSpeed($clockSpeed)
    {
        $this->clockSpeed = $clockSpeed;
    }

    /**
     * @return mixed
     */
    public function getDvi()
    {
        return $this->dvi;
    }

    /**
     * @param mixed $dvi
     */
    public function setDvi($dvi)
    {
        $this->dvi = $dvi;
    }

    /**
     * @return mixed
     */
    public function getHdmi()
    {
        return $this->hdmi;
    }

    /**
     * @param mixed $hdmi
     */
    public function setHdmi($hdmi)
    {
        $this->hdmi = $hdmi;
    }

    /**
     * @return mixed
     */
    public function getPowerUse()
    {
        return $this->powerUse;
    }

    /**
     * @param mixed $powerUse
     */
    public function setPowerUse($powerUse)
    {
        $this->powerUse = $powerUse;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function __ToString(){
        return $this->name;
    }


}