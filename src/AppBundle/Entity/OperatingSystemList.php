<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 22-2-2018
 * Time: 13:38
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="operating_system_list")
 */
class OperatingSystemList
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
    private $operatingSystemName;

    /**
     * @ORM\Column(type="string")
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
    public function getOperatingSystemName()
    {
        return $this->operatingSystemName;
    }

    /**
     * @param mixed $operatingSystemName
     */
    public function setOperatingSystemName($operatingSystemName)
    {
        $this->operatingSystemName = $operatingSystemName;
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
            return $this->operatingSystemName;
        }

}