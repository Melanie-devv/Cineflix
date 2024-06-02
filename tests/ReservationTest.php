<?php

namespace App\Tests\Entity;

use App\Entity\Dvd;
use App\Entity\Reservation;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ReservationTest extends TestCase
{
    public function testId()
    {
        $reservation = new Reservation();
        $this->assertNull($reservation->getId());
    }

    public function testDateReservation()
    {
        $reservation = new Reservation();
        $date = new \DateTime();
        $reservation->setDateReservation($date);
        $this->assertEquals($date, $reservation->getDateReservation());
    }

    public function testUser()
    {
        $reservation = new Reservation();
        $user = new User();
        $reservation->setUser($user);
        $this->assertSame($user, $reservation->getUser());
    }

    public function testDvd()
    {
        $reservation = new Reservation();
        $dvd = new Dvd();
        $reservation->setDvd($dvd);
        $this->assertSame($dvd, $reservation->getDvd());
    }

    public function testReadableDebutReservation()
    {
        $reservation = new Reservation();
        $date = new \DateTime();
        $reservation->setDateReservation($date);
        $this->assertEquals($date->format('d/m/Y'), $reservation->getReadableDebutReservation());
    }

    public function testReadableFinReservation()
    {
        $reservation = new Reservation();
        $dateReservation = \DateTime::createFromFormat('Y-m-d', '2022-01-01');
        $reservation->setDateReservation($dateReservation);
        $finReservation = \DateTime::createFromFormat('Y-m-d', '2022-02-01');
        $this->assertEquals($finReservation->format('d/m/Y'), $reservation->getReadableFinReservation());
    }
    public function testIsReservationOngoing()
    {
        $reservation = new Reservation();
        $date = new \DateTime();
        $reservation->setDateReservation($date);
        $this->assertTrue($reservation->isReservationOngoing());

        $date->sub(new \DateInterval('P2M'));
        $reservation->setDateReservation($date);
        $this->assertFalse($reservation->isReservationOngoing());
    }
}

?>