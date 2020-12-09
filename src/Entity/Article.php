<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $user;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        if((trim($title) == '') or (trim($title) == null))
        {
            throw new Exception("Le titre saisi est vide");
        } else {
            $this->title = $title;
        }

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        if((trim($user) == '') or (trim($user) == null))
        {
            throw new Exception('L\'utilisateur saisi est vide');
        } else {
            $this->user = $user;
        }

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        if((trim($content) == '') or (trim($content) == null))
        {
            throw new Exception('Le contenu est vide');
        } else {
            $this->content = $content;
        }

        return $this;
    }
}
