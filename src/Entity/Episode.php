<?php

namespace App\Entity;

use App\Repository\EpisodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpisodeRepository::class)]
class Episode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $duration = null;

    #[ORM\ManyToOne(inversedBy: 'episodes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Serie $serie = null;

    #[ORM\ManyToMany(targetEntity: Artist::class, inversedBy: 'featurings')]
    private Collection $featuring;

    public function __construct()
    {
        $this->featuring = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->title;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function getReadableDuration(): string
    {
        $duration = $this->getDuration();
        $moreThanOneHour = $duration >= 60;

        if ($moreThanOneHour) {
            $hours = floor($duration / 60);
            $minutes = $duration % 60;
            return $hours . 'h' . $minutes;
        } else {
            return $duration . 'm';
        }
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getSerie(): ?Serie
    {
        return $this->serie;
    }

    public function setSerie(?Serie $serie): static
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * @return Collection<int, Artist>
     */
    public function getFeaturing(): Collection
    {
        return $this->featuring;
    }

    public function addFeaturing(Artist $featuring): static
    {
        if (!$this->featuring->contains($featuring)) {
            $this->featuring->add($featuring);
        }

        return $this;
    }

    public function removeFeaturing(Artist $featuring): static
    {
        $this->featuring->removeElement($featuring);

        return $this;
    }
}
