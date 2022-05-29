<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaceRepository::class)]
class Race
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $img;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $season;

    #[ORM\ManyToMany(targetEntity: League::class, inversedBy: 'races')]
    private $ligue;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: RaceScore::class)]
    private $raceScores;

    public function __construct()
    {
        $this->ligue = new ArrayCollection();
        $this->raceScores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getSeason(): ?int
    {
        return $this->season;
    }

    public function setSeason(?int $season): self
    {
        $this->season = $season;

        return $this;
    }

    /**
     * @return Collection<int, league>
     */
    public function getLigue(): Collection
    {
        return $this->ligue;
    }

    public function addLigue(league $ligue): self
    {
        if (!$this->ligue->contains($ligue)) {
            $this->ligue[] = $ligue;
        }

        return $this;
    }

    public function removeLigue(league $ligue): self
    {
        $this->ligue->removeElement($ligue);

        return $this;
    }

    /**
     * @return Collection<int, RaceScore>
     */
    public function getRaceScores(): Collection
    {
        return $this->raceScores;
    }

    public function addRaceScore(RaceScore $raceScore): self
    {
        if (!$this->raceScores->contains($raceScore)) {
            $this->raceScores[] = $raceScore;
            $raceScore->setCourse($this);
        }

        return $this;
    }

    public function removeRaceScore(RaceScore $raceScore): self
    {
        if ($this->raceScores->removeElement($raceScore)) {
            // set the owning side to null (unless already changed)
            if ($raceScore->getCourse() === $this) {
                $raceScore->setCourse(null);
            }
        }

        return $this;
    }
}
