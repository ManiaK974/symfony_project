<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Brand
 *
 * @ORM\Table(name="brand")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BrandRepository")
 */
class Brand {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Model", mappedBy="brand")
     */
    private $models; // Notez le « s », une annonce est liée à plusieurs candidatures

    public function __construct() {
        $this->models = new ArrayCollection();
        // ...
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Brand
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

    function getModels() {
        return $this->models;
    }

    public function addModels(Model $model) {
        $this->models[] = $model;
        $model->setBrand($this);
        return $this;
    }

    public function removeModel(Model $model) {
        $this->models->removeElement($model);
    }

}
