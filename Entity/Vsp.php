<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vsp
 *
 * @ORM\Table(name="vsp")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VspRepository")
 */
class Vsp {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\VspType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brand")
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Model")
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Finition")
     * @ORM\JoinColumn(nullable=false)
     */
    private $finition;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mec", type="date")
     */
    private $dateMec;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="discount", type="integer")
     */
    private $discount;

    /**
     * @var int
     *
     * @ORM\Column(name="year_mec", type="integer")
     */
    private $yearMec;

    /**
     * @var int
     *
     * @ORM\Column(name="kms", type="integer")
     */
    private $kms;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="energy", type="integer")
     */
    private $energy;

    /**
     * @var string
     *
     * @ORM\Column(name="engine_type", type="string", length=255)
     */
    private $engineType;

    /**
     * @var float
     *
     * @ORM\Column(name="fuel_conso", type="float")
     */
    private $fuelConso;

    /**
     * @var int
     *
     * @ORM\Column(name="fuel_tank_capacity", type="integer")
     */
    private $fuelTankCapacity;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime")
     */
    private $createdDate;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    function getDiscount() {
        return $this->discount;
    }

    function setDiscount($discount) {
        $this->discount = $discount;
    }

    /**
     * Get type
     *
     * @return int
     */
    function getType() {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return VspType
     */
    function setType($type) {
        $this->type = $type;
    }

    /**
     * Get brand
     *
     * @return int
     */
    function getBrand() {
        return $this->brand;
    }

    /**
     * Get model
     *
     * @return int
     */
    function getModel() {
        return $this->model;
    }

    /**
     * Set brand
     *
     * @param string $brand
     *
     * @return Vsp
     */
    function setBrand($brand) {
        $this->brand = $brand;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Vsp
     */
    function setModel($model) {
        $this->model = $model;
    }

    /**
     * Get price
     *
     * @return integer
     */
    function getPrice() {
        return $this->price;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Vsp
     */
    function setPrice($price) {
        $this->price = $price;
    }

    /**
     * Set finition
     *
     * @param string $finition
     *
     * @return Vsp
     */
    public function setFinition($finition) {
        $this->finition = $finition;

        return $this;
    }

    /**
     * Get finition
     *
     * @return string
     */
    public function getFinition() {
        return $this->finition;
    }

    /**
     * Set dateMec
     *
     * @param \DateTime $dateMec
     *
     * @return Vsp
     */
    public function setDateMec($dateMec) {
        $this->dateMec = $dateMec;

        return $this;
    }

    /**
     * Get dateMec
     *
     * @return \DateTime
     */
    public function getDateMec() {
        return $this->dateMec;
    }

    /**
     * Set yearMec
     *
     * @param integer $yearMec
     *
     * @return Vsp
     */
    public function setYearMec($yearMec) {
        $this->yearMec = $yearMec;

        return $this;
    }

    /**
     * Get yearMec
     *
     * @return int
     */
    public function getYearMec() {
        return $this->yearMec;
    }

    /**
     * Set kms
     *
     * @param integer $kms
     *
     * @return Vsp
     */
    public function setKms($kms) {
        $this->kms = $kms;

        return $this;
    }

    /**
     * Get kms
     *
     * @return int
     */
    public function getKms() {
        return $this->kms;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Vsp
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set energy
     *
     * @param integer $energy
     *
     * @return Vsp
     */
    public function setEnergy($energy) {
        $this->energy = $energy;

        return $this;
    }

    /**
     * Get energy
     *
     * @return int
     */
    public function getEnergy() {
        return $this->energy;
    }

    function getCreatedDate() {
        return $this->createdDate;
    }

    function setCreatedDate(\DateTime $createdDate) {
        $this->createdDate = $createdDate;
    }

    /**
     * Set engineType
     *
     * @param string $engineType
     *
     * @return Vsp
     */
    public function setEngineType($engineType) {
        $this->engineType = $engineType;

        return $this;
    }

    /**
     * Get engineType
     *
     * @return string
     */
    public function getEngineType() {
        return $this->engineType;
    }

    /**
     * Set fuelConso
     *
     * @param float $fuelConso
     *
     * @return Vsp
     */
    public function setFuelConso($fuelConso) {
        $this->fuelConso = $fuelConso;

        return $this;
    }

    /**
     * Get fuelConso
     *
     * @return float
     */
    public function getFuelConso() {
        return $this->fuelConso;
    }

    /**
     * Set fuelTankCapacity
     *
     * @param integer $fuelTankCapacity
     *
     * @return Vsp
     */
    public function setFuelTankCapacity($fuelTankCapacity) {
        $this->fuelTankCapacity = $fuelTankCapacity;

        return $this;
    }

    /**
     * Get fuelTankCapacity
     *
     * @return int
     */
    public function getFuelTankCapacity() {
        return $this->fuelTankCapacity;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Vsp
     */
    public function setColor($color) {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor() {
        return $this->color;
    }

    public function __toString() {
        return $this->getName();
    }

}
