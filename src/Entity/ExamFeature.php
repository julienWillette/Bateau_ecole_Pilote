<?php

namespace App\Entity;

use App\Repository\ExamFeatureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExamFeatureRepository::class)
 */
class ExamFeature
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
     * @ORM\ManyToOne(targetEntity=License::class, inversedBy="examFeatures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $license;

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

    public function getLicense(): ?License
    {
        return $this->license;
    }

    public function setLicense(?License $license): self
    {
        $this->license = $license;

        return $this;
    }
}
