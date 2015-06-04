<?php

namespace BullportBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AnimalControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'bullport/animal');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Animal Hotel")')->count()
        );
    }

    public function testPrepareDwellingLeadsBackToIndexIfNoFormHadBeenSubmitted()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'bullport/animal/prepare');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Redirecting to /bullport/animal")')->count()
        );
    }

}
