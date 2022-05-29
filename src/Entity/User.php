<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Cette email est déja utilisée')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $lastname;

    #[ORM\Column(type: 'string', nullable: true)]
    private $phone;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $age;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $media;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $alt;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $numLicense;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $numTranspondeur;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $points;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titre;

    #[ORM\ManyToOne(targetEntity: League::class, inversedBy: 'users')]
    private $ligue;

    #[ORM\ManyToOne(targetEntity: Clubs::class, inversedBy: 'users')]
    private $club;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'users')]
    private $categorie;

    #[ORM\ManyToOne(targetEntity: RaceScore::class, inversedBy: 'utilisateur')]
    private $raceScore;

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
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
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
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getMedia(): ?string
    {
        return $this->media;
    }

    public function setMedia(?string $media): self
    {
        $this->media = $media;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getNumLicense(): ?int
    {
        return $this->numLicense;
    }

    public function setNumLicense(?int $numLicense): self
    {
        $this->numLicense = $numLicense;

        return $this;
    }

    public function getNumTranspondeur(): ?int
    {
        return $this->numTranspondeur;
    }

    public function setNumTranspondeur(?int $numTranspondeur): self
    {
        $this->numTranspondeur = $numTranspondeur;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getLigue(): ?league
    {
        return $this->ligue;
    }

    public function setLigue(?league $ligue): self
    {
        $this->ligue = $ligue;

        return $this;
    }

    public function getClub(): ?clubs
    {
        return $this->club;
    }

    public function setClub(?clubs $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getCategorie(): ?category
    {
        return $this->categorie;
    }

    public function setCategorie(?category $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getRaceScore(): ?RaceScore
    {
        return $this->raceScore;
    }

    public function setRaceScore(?RaceScore $raceScore): self
    {
        $this->raceScore = $raceScore;

        return $this;
    }
}
