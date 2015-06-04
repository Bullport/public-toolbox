<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Roost;

class Blankie implements RoostInterface
{
    public function prepareRoost()
    {
        return "Warm blanket spreaded.";
    }

}