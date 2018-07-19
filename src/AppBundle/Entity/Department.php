<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 8-3-2018
 * Time: 07:17
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="department")
 */
class Department
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
    private $departmentNumber;

    /**
     * @ORM\Column(type="string")
     */
    private $departmentName;

    /**
     * @ORM\Column(type="string")
     */
    private $departmentParent;

    /**
     * @ORM\Column(type="string")
     */
    private $companyID;




}