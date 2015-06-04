<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Generators;

use BullportBundle\Model\Animal\Cage;
use BullportBundle\Model\Animal\Feed;
use BullportBundle\Model\Animal\Roost;
use BullportBundle\Model\Animal\Toys;

class BirdGenerator implements GeneratorInterface
{

    /**
     * @return Cage\CageInterface
     */
    public function createCage()
    {
        return new Cage\Birdcage();
    }

    /**
     * @return Feed\FeedInterface
     */
    public function createFeed()
    {
        return new Feed\Grain();
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