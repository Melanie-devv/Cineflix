<?php

namespace App\Tests\Entity;

use App\Entity\Artist;
use App\Entity\Dvd;
use App\Entity\Reservation;
use PHPUnit\Framework\TestCase;

class DvdTest extends TestCase
{
    public function testId()
    {
        $dvd = new Dvd();
        $this->assertNull($dvd->getId());
    }

    public function testName()
    {
        $dvd = new Dvd();
        $dvd->setName('Test Name');
        $this->assertEquals('Test Name', $dvd->getName());
    }

    public function testReleaseDate()
    {
        $dvd = new Dvd();
        $date = new \DateTime();
        $dvd->setReleaseDate($date);
        $this->assertEquals($date, $dvd->getReleaseDate());
    }

    public function testDuration()
    {
        $dvd = new Dvd();
        $dvd->setDuration(120);
        $this->assertEquals(120, $dvd->getDuration());
    }

    public function testReadableDuration()
    {
        $dvd = new Dvd();
        $dvd->setDuration(120);
        $this->assertEquals('2h0', $dvd->getReadableDuration());

        $dvd->setDuration(30);
        $this->assertEquals('30m', $dvd->getReadableDuration());
    }

    public function testThumbnail()
    {
        $dvd = new Dvd();
        $dvd->setThumbnail('Test Thumbnail');
        $this->assertEquals('Test Thumbnail', $dvd->getThumbnail());
    }

    public function testStock()
    {
        $dvd = new Dvd();
        $dvd->setStock(10);
        $this->assertEquals(10, $dvd->getStock());
    }

    public function testReservations()
    {
        $dvd = new Dvd();
        $reservation = new Reservation();
        $dvd->addReservation($reservation);
        $this->assertCount(1, $dvd->getReservations());

        $dvd->removeReservation($reservation);
        $this->assertCount(0, $dvd->getReservations());
    }

    public function testProducer()
    {
        $dvd = new Dvd();
        $artist = new Artist();
        $dvd->setProducer($artist);
        $this->assertSame($artist, $dvd->getProducer());
    }

    public function testToString()
    {
        $dvd = new Dvd();
        $dvd->setName('Test Name');
        $this->assertEquals('Test Name', $dvd->__toString());
    }
}

?>