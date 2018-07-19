<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 22-2-2018
 * Time: 10:09
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="main_board")
 */
class MainBoard
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
     * @ORM\Column(type="integer")
     */
    private $PCLex16;

    /**
     * @ORM\Column(type="integer")
     */
    private $PCLex1;

    /**
     * @ORM\Column(type="integer")
     */
    private $memorySlots;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MemoryList")
     */
    private $memoryMax;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MemoryTypeList")
     */
    private $memoryTypes;

    /**
     * @ORM\Column(type="integer")
     */
    private $usb2_0;

    /**
     * @ORM\Column(type="integer")
     */
    private $usb3_0;

    /**
     * @ORM\Column(type="integer")
     */
    private $usb3_1;

    /**
     * @ORM\Column(type="integer")
     */
    private $hdmi_inputs;

    /**
     * @ORM\Column(type="integer")
     */
    private $dvi_inputs;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bluetooth;

    /**
     * @ORM\Column(type="boolean")
     */
    private $wlan;

    /**
     * @ORM\Column(type="boolean")
     */
    private $microphone_in;

    /**
     * @ORM\Column(type="boolean")
     */
    private $line_in;

    /**
     * @ORM\Column(type="boolean")
     */
    private $line_out;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    public function __construct(){

        $this->memoryMax = new ArrayCollection();

        $this->memoryTypes = new ArrayCollection();

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
    public function getPCLex16()
    {
        return $this->PCLex16;
    }

    /**
     * @param mixed $PCLex16
     */
    public function setPCLex16($PCLex16)
    {
        $this->PCLex16 = $PCLex16;
    }

    /**
     * @return mixed
     */
    public function getPCLex1()
    {
        return $this->PCLex1;
    }

    /**
     * @param mixed $PCLex1
     */
    public function setPCLex1($PCLex1)
    {
        $this->PCLex1 = $PCLex1;
    }

    /**
     * @return mixed
     */
    public function getMemorySlots()
    {
        return $this->memorySlots;
    }

    /**
     * @param mixed $memorySlots
     */
    public function setMemorySlots($memorySlots)
    {
        $this->memorySlots = $memorySlots;
    }

    /**
     * @return mixed
     */
    public function getMemoryMax()
    {
        return $this->memoryMax;
    }

    /**
     * @param mixed $memoryMax
     */
    public function setMemoryMax(MemoryList $memoryMax)
    {
        $this->memoryMax = $memoryMax;
    }

    /**
     * @return mixed
     */
    public function getMemoryTypes()
    {
        return $this->memoryTypes;
    }

    /**
     * @param mixed $memoryTypes
     */
    public function setMemoryTypes(MemoryTypeList $memoryTypes)
    {
        $this->memoryTypes = $memoryTypes;
    }

    /**
     * @return mixed
     */
    public function getUsb20()
    {
        return $this->usb2_0;
    }

    /**
     * @param mixed $usb2_0
     */
    public function setUsb20($usb2_0)
    {
        $this->usb2_0 = $usb2_0;
    }

    /**
     * @return mixed
     */
    public function getUsb30()
    {
        return $this->usb3_0;
    }

    /**
     * @param mixed $usb3_0
     */
    public function setUsb30($usb3_0)
    {
        $this->usb3_0 = $usb3_0;
    }

    /**
     * @return mixed
     */
    public function getUsb31()
    {
        return $this->usb3_1;
    }

    /**
     * @param mixed $usb3_1
     */
    public function setUsb31($usb3_1)
    {
        $this->usb3_1 = $usb3_1;
    }

    /**
     * @return mixed
     */
    public function getHdmiInputs()
    {
        return $this->hdmi_inputs;
    }

    /**
     * @param mixed $hdmi_inputs
     */
    public function setHdmiInputs($hdmi_inputs)
    {
        $this->hdmi_inputs = $hdmi_inputs;
    }

    /**
     * @return mixed
     */
    public function getDviInputs()
    {
        return $this->dvi_inputs;
    }

    /**
     * @param mixed $dvi_inputs
     */
    public function setDviInputs($dvi_inputs)
    {
        $this->dvi_inputs = $dvi_inputs;
    }

    /**
     * @return mixed
     */
    public function getBluetooth()
    {
        return $this->bluetooth;
    }

    /**
     * @param mixed $bluetooth
     */
    public function setBluetooth($bluetooth)
    {
        $this->bluetooth = $bluetooth;
    }

    /**
     * @return mixed
     */
    public function getWlan()
    {
        return $this->wlan;
    }

    /**
     * @param mixed $wlan
     */
    public function setWlan($wlan)
    {
        $this->wlan = $wlan;
    }

    /**
     * @return mixed
     */
    public function getMicrophoneIn()
    {
        return $this->microphone_in;
    }

    /**
     * @param mixed $microphone_in
     */
    public function setMicrophoneIn($microphone_in)
    {
        $this->microphone_in = $microphone_in;
    }

    /**
     * @return mixed
     */
    public function getLineIn()
    {
        return $this->line_in;
    }

    /**
     * @param mixed $line_in
     */
    public function setLineIn($line_in)
    {
        $this->line_in = $line_in;
    }

    /**
     * @return mixed
     */
    public function getLineOut()
    {
        return $this->line_out;
    }

    /**
     * @param mixed $line_out
     */
    public function setLineOut($line_out)
    {
        $this->line_out = $line_out;
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