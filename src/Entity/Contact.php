<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3, max=255, minMessage = "Votre prénom doit faire au minimum {{ limit }} caractères"))
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2, max=255, minMessage = "Votre nom doit faire au minimum {{ limit }} caractères"))
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message = "L'email '{{ value }}' n'est pas valide !")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min = 10, max = 10, minMessage = "Numéro invalide", maxMessage = "Numéro invalide")
     *  @Assert\Regex(pattern="/^[0-9]*$/", message="un numéro de téléphone ne peut contenir que des chiffres")
     */
    private $phone;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=10, minMessage = "Votre message doit faire au minimum {{ limit }} caractères")
     */
    private $content;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

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
}
