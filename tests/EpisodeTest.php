<?php

namespace App\Tests\Entity;

use App\Entity\Artist;
use App\Entity\Episode;
use App\Entity\Serie;
use PHPUnit\Framework\TestCase;

class EpisodeTest extends TestCase
{
    public function testId()
    {
        $episode = new Episode();
        $this->assertNull($episode->getId());
    }

    public function testTitle()
    {
        $episode = new Episode();
        $episode->setTitle('Test Title');
        $this->assertEquals('Test Title', $episode->getTitle());
    }

    public function testDuration()
    {
        $episode = new Episode();
        $episode->setDuration(60);
        $this->assertEquals(60, $episode->getDuration());
    }

    public function testReadableDuration()
    {
        $episode = new Episode();
        $episode->setDuration(75);
        $this->assertEquals('1h15', $episode->getReadableDuration());

        $episode->setDuration(30);
        $this->assertEquals('30m', $episode->getReadableDuration());
    }

    public function testSerie()
    {
        $episode = new Episode();
        $serie = new Serie();
        $episode->setSerie($serie);
        $this->assertSame($serie, $episode->getSerie());
    }

    public function testFeaturing()
    {
        $episode = new Episode();
        $artist = new Artist();
        $episode->addFeaturing($artist);
        $this->assertCount(1, $episode->getFeaturing());

        $episode->removeFeaturing($artist);
        $this->assertCount(0, $episode->getFeaturing());
    }
}