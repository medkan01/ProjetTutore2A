<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=40)
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

    public function getRoles(): ?string
    {
        return $this->roles;
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
}
