<?php


namespace App\Tests\Entity;

use App\Entity\Reservation;
use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testId()
    {
        $user = new User();
        $this->assertNull($user->getId());
    }

    public function testEmail()
    {
        $user = new User();
        $user->setEmail('test@example.com');
        $this->assertEquals('test@example.com', $user->getEmail());
    }

    public function testFirstname()
    {
        $user = new User();
        $user->setFirstname('John');
        $this->assertEquals('John', $user->getFirstname());
    }

    public function testName()
    {
        $user = new User();
        $user->setName('Doe');
        $this->assertEquals('Doe', $user->getName());
    }

    public function testReservations()
    {
        $user = new User();
        $reservation = new Reservation();
        $user->addReservation($reservation);
        $this->assertCount(1, $user->getReservations());

        $user->removeReservation($reservation);
        $this->assertCount(0, $user->getReservations());
    }

    public function testRoles()
    {
        $user = new User();
        $this->assertEquals(['ROLE_USER'], $user->getRoles());

        $user->setRoles(['ROLE_ADMIN']);
        $this->assertEquals(['ROLE_ADMIN', 'ROLE_USER'], $user->getRoles());
    }

    public function testHasReservationOngoing()
    {
        $user = new User();
        $this->assertFalse($user->hasReservationOngoing());

        $reservation = $this->createMock(Reservation::class);
        $reservation->method('isReservationOngoing')->willReturn(true);
        $user->addReservation($reservation);
        $this->assertTrue($user->hasReservationOngoing());
    }

    public function testToString()
    {
        $user = new User();
        $user->setName('Doe');
        $user->setFirstname('John');
        $this->assertEquals('DOE John', $user->__toString());
    }
}
?>