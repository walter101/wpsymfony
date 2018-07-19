<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 22-2-2018
 * Time: 11:44
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="memory_type_list")
 */
class MemoryTypeList
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
    private $memoryTypeOption;

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
    public function getMemoryTypeOption()
    {
        return $this->memoryTypeOption;
    }

    /**
     * @param mixed $memoryTypeOption
     */
    public function setMemoryTypeOption($memoryTypeOption)
    {
        $this->memoryTypeOption = $memoryTypeOption;
    }

    public function __ToString(){
        return $this->memoryTypeOption;
    }

}