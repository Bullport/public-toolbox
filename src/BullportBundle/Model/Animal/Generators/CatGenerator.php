<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Generators;

use BullportBundle\Model\Animal\Cage;
use BullportBundle\Model\Animal\Feed;
use BullportBundle\Model\Animal\Roost;
use BullportBundle\Model\Animal\Toys;

class CatGenerator implements GeneratorInterface
{

    /**
     * @return Cage\CageInterface
     */
    public function createCage()
    {
        return new Cage\Catcage();
    }

    /**
     * @return Feed\FeedInterface
     */
    public function createFeed()
    {
        return new Feed\Meat();
    }

    /**
     * @return Roost\RoostInterface
     */
    public function createRoost()
    {
        return new Roost\Blankie();
    }

    /**
     * @return Toys\ToyInterface
     */
    public function createToy()
    {
        return new Toys\CatTree();
    }
}