<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Model
 *
 * @ORM\Table(name="model")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModelRepository")
 */
class Model {

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
     * 
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brand")
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Finition", cascade={"persist"})
     */
    private $finitions;

    // Comme la propriété $categories doit être un ArrayCollection,
    // On doit la définir dans un constructeur :
    public function __construct() {
        $this->finitions = new ArrayCollection();
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
     * @return Model
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

    function getBrand() {
        return $this->brand;
    }

    function getFinitions() {
        return $this->finitions;
    }

    function setBrand($brand) {
        $this->brand = $brand;
    }

    // Notez le singulier, on ajoute une seule catégorie à la fois
    public function addFinition(Finition $finition) {
        // Ici, on utilise l'ArrayCollection vraiment comme un tableau
        $this->finitions[] = $finition;

        return $this;
    }

    public function removeFinition(Finition $finition) {
        // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
        $this->finitions->removeElement($finition);
    }
}
