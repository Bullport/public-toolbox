<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Tests;

use BullportBundle\Model\Animal\Generators\CatGenerator;

class CatGeneratorTest extends \PHPUnit_Framework_TestCase
{
    protected $generator;

     public function setUp()
    {
        $this->generator = new CatGenerator();
    }

    public function testIfGeneratorProvidesCorrectCage()
    {
        $cage = $this->generator->createCage();
        $this->assertInstanceOf('BullportBundle\Model\Animal\Cage\Catcage', $cage);
    }

    public function testIfGeneratorProvidesCorrectFeed()
    {
        $feed = $this->generator->createFeed();
        $this->assertInstanceOf('BullportBundle\Model\Animal\Feed\Meat', $feed);
    }

    public function testIfGeneratorProvidesCorrectRoost()
    {
        $roost = $this->generator->createRoost();
        $this->assertInstanceOf('BullportBundle\Model\Animal\Roost\Blankie', $roost);
    }

    public function testIfGeneratorProvidesCorrectToy()
    {
        $toy = $this->generator->createToy();
        $this->assertInstanceOf('BullportBundle\Model\Animal\Toys\CatTree', $toy);
    }

}
