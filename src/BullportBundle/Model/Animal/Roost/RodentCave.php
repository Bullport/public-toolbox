<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Roost;

class RodentCave implements RoostInterface
{
    public function prepareRoost()
    {
        return "Snugly cave established.";
    }

}