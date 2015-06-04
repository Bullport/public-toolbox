<?php

namespace BullportBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IndexControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'bullport');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Welcome")')->count()
        );
    }

}
