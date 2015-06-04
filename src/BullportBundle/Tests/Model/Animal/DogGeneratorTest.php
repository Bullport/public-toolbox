<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Tests;

use BullportBundle\Model\Animal\Generators\DogGenerator;

class DogGeneratorTest extends \PHPUnit_Framework_TestCase
{
    protected $generator;

     public function setUp()
    {
        $this->generator = new DogGenerator();
    }

    public function testIfGeneratorProvidesCorrectCage()
    {
        $cage = $this->generator->createCage();
        $this->assertInstanceOf('BullportBundle\Model\Animal\Cage\DogKennel', $cage);
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
        $this->assertInstanceOf('BullportBundle\Model\Animal\Toys\Ball', $toy);
    }
    
}
