<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Tests;

use BullportBundle\Model\Animal\Generators\BirdGenerator;

class BirdGeneratorTest extends \PHPUnit_Framework_TestCase
{
    protected $generator;

     public function setUp()
    {
        $this->generator = new BirdGenerator();
    }

    public function testIfGeneratorProvidesCorrectCage()
    {
        $cage = $this->generator->createCage();
        $this->assertInstanceOf('BullportBundle\Model\Animal\Cage\Birdcage', $cage);
    }

    public function testIfGeneratorProvidesCorrectFeed()
    {
        $feed = $this->generator->createFeed();
        $this->assertInstanceOf('BullportBundle\Model\Animal\Feed\Grain', $feed);
    }

    public function testIfGeneratorProvidesCorrectRoost()
    {
        $roost = $this->generator->createRoost();
        $this->assertInstanceOf('BullportBundle\Model\Animal\Roost\Pallet', $roost);
    }

    public function testIfGeneratorProvidesCorrectToy()
    {
        $toy = $this->generator->createToy();
        $this->assertInstanceOf('BullportBundle\Model\Animal\Toys\Mirror', $toy);
    }

}
