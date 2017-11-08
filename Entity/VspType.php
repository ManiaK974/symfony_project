<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VspType
 *
 * @ORM\Table(name="vsp_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VspTypeRepository")
 */
class VspType {

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
     * @return VspType
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

    function getType_vsp() {
        return $this->type_vsp;
    }

    function setType_vsp($type_vsp) {
        $this->type_vsp = $type_vsp;
    }

}
