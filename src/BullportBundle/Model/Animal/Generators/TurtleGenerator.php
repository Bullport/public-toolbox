<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Generators;

use BullportBundle\Model\Animal\Cage;
use BullportBundle\Model\Animal\Feed;
use BullportBundle\Model\Animal\Roost;
use BullportBundle\Model\Animal\Toys;

class TurtleGenerator implements GeneratorInterface
{

    /**
     * @return Cage\CageInterface
     */
    public function createCage()
    {
        return new Cage\Terrarium();
    }

    /**
     * @return Feed\FeedInterface
     */
    public function createFeed()
    {
        return new Feed\Vegetables();
    }

    /**
     * @return Roost\RoostInterface
     */
    public function createRoost()
    {
        return new Roost\Pallet();
    }

    /**
     * @return Toys\ToyInterface
     */
    public function createToy()
    {
        return new Toys\Mirror();
    }
}