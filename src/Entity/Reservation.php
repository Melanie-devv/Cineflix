<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_reservation = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Dvd $dvd = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTimeInterface $date_reservation): static
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getDvd(): ?Dvd
    {
        return $this->dvd;
    }

    public function setDvd(?Dvd $dvd): static
    {
        $this->dvd = $dvd;

        return $this;
    }

    public function getReadableDebutReservation(): string
    {
        return $this->date_reservation->format('d/m/Y');
    }

    public function getReadableFinReservation(): string
    {
        $fin_reservation = new \DateTime($this->date_reservation->format('Y-m-d H:i:s'));
        $fin_reservation->add(new \DateInterval('P1M'));
        return $fin_reservation->format('d/m/Y');
    }

    public function isReservationOngoing(): bool
    {
        $fin_reservation = new \DateTime($this->date_reservation->format('Y-m-d H:i:s'));
        $fin_reservation->add(new \DateInterval('P1M'));

        return $fin_reservation > new \DateTime();
    }

    public function __toString(): string
    {
        return  $this->id;
    }
}
