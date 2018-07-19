<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 8-3-2018
 * Time: 07:22
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Employee
{

    private $id;

    private $employeeNumber;

    private $firstName;

    private $lastName;

    private $birthDate;

    private $hireDate;

    private $companyID;

}