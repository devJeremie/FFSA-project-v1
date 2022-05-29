<?php

namespace App\Entity;

use App\Repository\RaceScoreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaceScoreRepository::class)]
class RaceScore
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $position;

    #[ORM\OneToMany(mappedBy: 'raceScore', targetEntity: user::class)]
    private $utilisateur;

    #[ORM\ManyToOne(targetEntity: race::class, inversedBy: 'raceScores')]
    private $course;

    public function __construct()
    {
        $this->utilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Collection<int, user>
     */
    public function getUtilisateur(): Collection
    {
        return $this->utilisateur;
    }

    public function addUtilisateur(user $utilisateur): self
    {
        if (!$this->utilisateur->contains($utilisateur)) {
            $this->utilisateur[] = $utilisateur;
            $utilisateur->setRaceScore($this);
        }

        return $this;
    }

    public function removeUtilisateur(user $utilisateur): self
    {
        if ($this->utilisateur->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getRaceScore() === $this) {
                $utilisateur->setRaceScore(null);
            }
        }

        return $this;
    }

    public function getCourse(): ?race
    {
        return $this->course;
    }

    public function setCourse(?race $course): self
    {
        $this->course = $course;

        return $this;
    }
}
