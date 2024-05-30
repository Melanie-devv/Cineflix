<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $thumbnail = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $bio = null;

    #[ORM\OneToMany(mappedBy: 'artist', targetEntity: Serie::class, orphanRemoval: true)]
    private Collection $series;

    #[ORM\ManyToMany(targetEntity: Episode::class, mappedBy: 'featuring')]
    private Collection $featurings;

    #[ORM\OneToMany(mappedBy: 'producer', targetEntity: Dvd::class)]
    private Collection $dvds;

    public function __construct()
    {
        $this->series = new ArrayCollection();
        $this->featurings = new ArrayCollection();
        $this->dvds = new ArrayCollection();
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

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): static
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * @return Collection<int, Serie>
     */
    public function getSeries(): Collection
    {
        return $this->series;
    }

    public function addSerie(Serie $serie): static
    {
        if (!$this->series->contains($serie)) {
            $this->series->add($serie);
            $serie->setArtist($this);
        }

        return $this;
    }

    public function removeSerie(Serie $serie): static
    {
        if ($this->series->removeElement($serie)) {
            // set the owning side to null (unless already changed)
            if ($serie->getArtist() === $this) {
                $serie->setArtist(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Episode>
     */
    public function getFeaturings(): Collection
    {
        return $this->featurings;
    }

    public function addFeaturing(Episode $featuring): static
    {
        if (!$this->featurings->contains($featuring)) {
            $this->featurings->add($featuring);
            $featuring->addFeaturing($this);
        }

        return $this;
    }

    public function removeFeaturing(Episode $featuring): static
    {
        if ($this->featurings->removeElement($featuring)) {
            $featuring->removeFeaturing($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Dvd>
     */
    public function getDvds(): Collection
    {
        return $this->dvds;
    }

    public function addDvd(Dvd $dvd): static
    {
        if (!$this->dvds->contains($dvd)) {
            $this->dvds->add($dvd);
            $dvd->setProducer($this);
        }

        return $this;
    }

    public function removeDvd(Dvd $dvd): static
    {
        if ($this->dvds->removeElement($dvd)) {
            // set the owning side to null (unless already changed)
            if ($dvd->getProducer() === $this) {
                $dvd->setProducer(null);
            }
        }

        return $this;
    }
}
