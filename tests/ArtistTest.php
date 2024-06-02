<?php

namespace App\Tests\Entity;

use App\Entity\Artist;
use App\Entity\Episode;
use App\Entity\Serie;
use App\Entity\Dvd;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class ArtistTest extends TestCase
{
    public function testId()
    {
        $artist = new Artist();
        $this->assertNull($artist->getId());
    }

    public function testName()
    {
        $artist = new Artist();
        $artist->setName('Test Name');
        $this->assertEquals('Test Name', $artist->getName());
    }

    public function testThumbnail()
    {
        $artist = new Artist();
        $artist->setThumbnail('Test Thumbnail');
        $this->assertEquals('Test Thumbnail', $artist->getThumbnail());
    }

    public function testBio()
    {
        $artist = new Artist();
        $artist->setBio('Test Bio');
        $this->assertEquals('Test Bio', $artist->getBio());
    }

    public function testSeries()
    {
        $artist = new Artist();
        $serie = new Serie();
        $artist->addSerie($serie);
        $this->assertCount(1, $artist->getSeries());

        $artist->removeSerie($serie);
        $this->assertCount(0, $artist->getSeries());
    }

    public function testFeaturings()
    {
        $artist = new Artist();
        $episode = new Episode();
        $artist->addFeaturing($episode);
        $this->assertCount(1, $artist->getFeaturings());

        $artist->removeFeaturing($episode);
        $this->assertCount(0, $artist->getFeaturings());
    }

    public function testDvds()
    {
        $artist = new Artist();
        $dvd = new Dvd();
        $artist->addDvd($dvd);
        $this->assertCount(1, $artist->getDvds());

        $artist->removeDvd($dvd);
        $this->assertCount(0, $artist->getDvds());
    }
}
?>