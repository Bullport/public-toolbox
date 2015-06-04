<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PizzaControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'bullport/pizza');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Pizza compositor")')->count()
        );
    }

    public function testCalculateLeadsBackToIndexIfNoFormHadBeenSubmitted()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'bullport/pizza/calculate');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Redirecting to /bullport/pizza")')->count()
        );
    }

}
