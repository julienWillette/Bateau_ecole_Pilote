<?php

namespace App\Entity;

use App\Repository\IconRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IconRepository::class)
 */
class Icon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fontAwesome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Home::class, inversedBy="icons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $home;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFontAwesome(): ?string
    {
        return $this->fontAwesome;
    }

    public function setFontAwesome(string $fontAwesome): self
    {
        $this->fontAwesome = $fontAwesome;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHome(): ?Home
    {
        return $this->home;
    }

    public function setHome(?Home $home): self
    {
        $this->home = $home;

        return $this;
    }
}
