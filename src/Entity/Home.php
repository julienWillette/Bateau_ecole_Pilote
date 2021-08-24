<?php

namespace App\Entity;

use App\Repository\HomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HomeRepository::class)
 */
class Home
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
    private $video;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quote;

    /**
     * @ORM\OneToMany(targetEntity=Icon::class, mappedBy="home", cascade={"persist"})
     */
    private $icons;

    public function __construct()
    {
        $this->icons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getQuote(): ?string
    {
        return $this->quote;
    }

    public function setQuote(string $quote): self
    {
        $this->quote = $quote;

        return $this;
    }

    /**
     * @return Collection|Icon[]
     */
    public function getIcons(): Collection
    {
        return $this->icons;
    }

    public function addIcon(Icon $icon): self
    {
        if (!$this->icons->contains($icon)) {
            $this->icons[] = $icon;
            $icon->setHome($this);
        }

        return $this;
    }

    public function removeIcon(Icon $icon): self
    {
        if ($this->icons->removeElement($icon)) {
            // set the owning side to null (unless already changed)
            if ($icon->getHome() === $this) {
                $icon->setHome(null);
            }
        }

        return $this;
    }
}
