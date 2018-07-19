<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 20-2-2018
 * Time: 21:02
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="memory_list")
 */
class MemoryList
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
    private $memoryOption;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

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
    public function getMemoryOption()
    {
        return $this->memoryOption;
    }

    /**
     * @param mixed $memoryOption
     */
    public function setMemoryOption($memoryOption)
    {
        $this->memoryOption = $memoryOption;
    }

    public function __ToString()
    {

        return $this->getMemoryOption();

    }

}