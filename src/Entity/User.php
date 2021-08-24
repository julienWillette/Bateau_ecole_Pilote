<?php

namespace App\Entity;

use ArrayAccess;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
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
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\Email(message = "L'email '{{ value }}' n'est pas valide !")
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3, max=255, minMessage = "Votre prénom doit faire au minimum {{ limit }} caractères")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2, max=255, minMessage = "Votre nom doit faire au minimum {{ limit }} caractères")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=6, max=255, minMessage = "Votre adresse doit faire au minimum {{ limit }} caractères")
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min = 10, max = 10, minMessage = "Numéro invalide", maxMessage = "Numéro invalide")
     * @Assert\Regex(pattern="/^[0-9]*$/", message="un numéro de téléphone ne peut contenir que des chiffres")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $civility;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(pattern="/^[0-9]*$/", message="un code postal ne peut contenir que des chiffres")
     * @Assert\Length(min = 5, max = 5, minMessage = "code postal invalide", maxMessage = "code postal invalide")
     */
    private $zipCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min = 3, minMessage = "Votre Pays n'existe pas")
     */
    private $country;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cerfaFilename;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $taxStampDeliverance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $taxStampInnerWater;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $identityFilename;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $identityPictureFilename;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $taxStampCoastal;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsActivated;

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
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(string $civility): self
    {
        $this->civility = $civility;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getCerfaFilename(): ?string
    {
        return $this->cerfaFilename;
    }

    public function setCerfaFilename(?string $cerfaFilename): self
    {
        $this->cerfaFilename = $cerfaFilename;

        return $this;
    }

    public function getTaxStampDeliverance(): ?string
    {
        return $this->taxStampDeliverance;
    }

    public function setTaxStampDeliverance(?string $taxStampDeliverance): self
    {
        $this->taxStampDeliverance = $taxStampDeliverance;

        return $this;
    }

    public function getTaxStampInnerWater(): ?string
    {
        return $this->taxStampInnerWater;
    }

    public function setTaxStampInnerWater(?string $taxStampInnerWater): self
    {
        $this->taxStampInnerWater = $taxStampInnerWater;

        return $this;
    }

    public function getIdentityFilename(): ?string
    {
        return $this->identityFilename;
    }

    public function setIdentityFilename(?string $identityFilename): self
    {
        $this->identityFilename = $identityFilename;

        return $this;
    }

    public function getIdentityPictureFilename(): ?string
    {
        return $this->identityPictureFilename;
    }

    public function setIdentityPictureFilename(?string $identityPictureFilename): self
    {
        $this->identityPictureFilename = $identityPictureFilename;

        return $this;
    }

    public function getTaxStampCoastal(): ?string
    {
        return $this->taxStampCoastal;
    }

    public function setTaxStampCoastal(?string $taxStampCoastal): self
    {
        $this->taxStampCoastal = $taxStampCoastal;

        return $this;
    }

    public function getIsActivated(): ?bool
    {
        return $this->IsActivated;
    }

    public function setIsActivated(bool $IsActivated): self
    {
        $this->IsActivated = $IsActivated;

        return $this;
    }
}
