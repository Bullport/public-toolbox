<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Generators;

interface GeneratorInterface
{
    /**
     * @return BullportBundle\Model\Animal\Cage\CageInterface
     */
    public function createCage();

    /**
     * @return BullportBundle\Model\Animal\Feed\FeedInterface
     */
    public function createFeed();

    /**
     * @return BullportBundle\Model\Animal\Roost\RoostInterface
     */
    public function createRoost();

    /**
     * @return BullportBundle\Model\Animal\Toys\ToyInterface
     */
    public function createToy();
}