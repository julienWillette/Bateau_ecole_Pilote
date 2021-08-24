<?php

namespace App\Entity;

use App\Repository\LicenseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LicenseRepository::class)
 */
class License
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
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="text")
     */
    private $feature;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\OneToMany(targetEntity=ExamFeature::class, mappedBy="license", cascade={"persist"})
     */
    private $examFeatures;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActivated;

    public function __construct()
    {
        $this->examFeatures = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getFeature(): ?string
    {
        return $this->feature;
    }

    public function setFeature(string $feature): self
    {
        $this->feature = $feature;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|ExamFeature[]
     */
    public function getExamFeatures(): Collection
    {
        return $this->examFeatures;
    }

    public function addExamFeature(ExamFeature $examFeature): self
    {
        if (!$this->examFeatures->contains($examFeature)) {
            $this->examFeatures[] = $examFeature;
            $examFeature->setLicense($this);
        }

        return $this;
    }

    public function removeExamFeature(ExamFeature $examFeature): self
    {
        if ($this->examFeatures->removeElement($examFeature)) {
            // set the owning side to null (unless already changed)
            if ($examFeature->getLicense() === $this) {
                $examFeature->setLicense(null);
            }
        }

        return $this;
    }

    public function getIsActivated(): ?bool
    {
        return $this->isActivated;
    }

    public function setIsActivated(bool $isActivated): self
    {
        $this->isActivated = $isActivated;

        return $this;
    }
}
