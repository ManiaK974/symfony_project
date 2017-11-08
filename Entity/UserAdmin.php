<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * UserAdmin
 *
 * @ORM\Table(name="user_admin")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserAdminRepository")
 * @UniqueEntity(fields="login",message="Ce login est déjà utilisé, veuillez en choisir un autre.")
 * 
 */
class UserAdmin 
{
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
     * @ORM\Column(name="login", type="string", length=255, unique=true)
     * @Assert\Length(min=6, minMessage="Votre login doit contenir {{ limit }} caractères minimum")
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, unique=true)
     * @Assert\Email(message="Ceci n'est pas une adresse mail valide")
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\Length(min=8, minMessage="Votre mot de passe doit contenir {{ limit }} caractères minimum")
     */
    private $password;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return UserAdmin
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return UserAdmin
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return UserAdmin
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

}

