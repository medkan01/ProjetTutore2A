<?php

namespace App\Entity;

use Exception;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 *  fields={"email"},
 *  message= "l'email indiqué est déjà utilisé"
 * )
 * * @UniqueEntity(
 *  fields={"username"},
 *  message= "le nom d'utilisateur est déjà utilisé"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=200)
     * @Assert\Length(min="8", minMessage = "Votre mot de passe doit faire minimum 8 caractères")
     * @Assert\EqualTo(propertyPath="confirm_password", message="Les mots de passe ne sont pas identique")
     */
    private $password;

    public $confirm_password;
    
    /**
     * @ORM\Column(type="string", length=40)
     */
    private $roles;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $username;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        if ((trim($email) == null) or (trim($email) == ''))
        {
            throw new Exception("L'adresse email saisie est vide");
        } else {
            $this->email = trim($email);
        }

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        if ((trim($password) == null) or (trim($password) == ''))
        {
            throw new Exception("Le mot de passe saisi est vide");
        } else {
            $this->password = trim($password);
        }

        return $this;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function setRoles(string $roles): self
        {
            if ((trim($roles) == null) or (trim($roles) == ''))
            {
                throw new Exception("Le mot de passe saisi est vide");
            } else {
                $this->roles = trim($roles);
            }
    
            return $this;
        }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        if((trim($name) == '') or (trim($name) == null))
        {
            throw new Exception("Le nom saisi est vide");
        } else {
            $this->name = $name;
        }

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        if((trim($username) == '') or (trim($username) == null))
        {
            throw new Exception("Le nom d'utilisateur saisi est vide");
        } else {
            $this->username = $username;
        }

        return $this;
    }

    public function eraseCredentials() {}

    public function getSalt(){

    }
}