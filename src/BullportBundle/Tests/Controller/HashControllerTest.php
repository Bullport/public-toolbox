<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HashControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'bullport/hash');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Calculation of HASHes")')->count()
        );
    }

    public function testCalculateLeadsBackToIndexIfNoFormHadBeenSubmitted()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'bullport/hash/calculate');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Redirecting to /bullport/hash")')->count()
        );
    }

}
