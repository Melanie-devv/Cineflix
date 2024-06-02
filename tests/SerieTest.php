<?php

namespace App\Tests\Entity;

use App\Entity\Artist;
use App\Entity\Episode;
use App\Entity\Serie;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class SerieTest extends TestCase
{
    public function testId()
    {
        $serie = new Serie();
        $this->assertNull($serie->getId());
    }

    public function testTitle()
    {
        $serie = new Serie();
        $serie->setTitle('Test Title');
        $this->assertEquals('Test Title', $serie->getTitle());
    }

    public function testThumbnail()
    {
        $serie = new Serie();
        $serie->setThumbnail('Test Thumbnail');
        $this->assertEquals('Test Thumbnail', $serie->getThumbnail());
    }

    public function testReleaseDate()
    {
        $serie = new Serie();
        $date = new \DateTime();
        $serie->setReleaseDate($date);
        $this->assertEquals($date, $serie->getReleaseDate());
    }

    public function testEpisodes()
    {
        $serie = new Serie();
        $episode = new Episode();
        $serie->addEpisode($episode);
        $this->assertCount(1, $serie->getEpisodes());

        $serie->removeEpisode($episode);
        $this->assertCount(0, $serie->getEpisodes());
    }

    public function testArtist()
    {
        $serie = new Serie();
        $artist = new Artist();
        $serie->setArtist($artist);
        $this->assertSame($artist, $serie->getArtist());
    }

    public function testType()
    {
        $serie = new Serie();
        $serie->setType(1);
        $this->assertEquals(1, $serie->getType());
        $this->assertEquals('En cours', $serie->getTypeLabel());
    }

    public function testDuration()
    {
        $serie = new Serie();
        $episode1 = new Episode();
        $episode1->setDuration(30);
        $serie->addEpisode($episode1);

        $episode2 = new Episode();
        $episode2->setDuration(45);
        $serie->addEpisode($episode2);

        $this->assertEquals(75, $serie->getDuration());
        $this->assertEquals('1h15', $serie->getReadableDuration());
    }

    public function testSeason()
    {
        $serie = new Serie();
        $serie->setSeason(1);
        $this->assertEquals(1, $serie->getSeason());
    }

    public function testToString()
    {
        $serie = new Serie();
        $serie->setTitle('Test Title');
        $this->assertEquals('Test Title', $serie->__toString());
    }
}
?>