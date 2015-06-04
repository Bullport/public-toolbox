<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Roost;

class Pallet implements RoostInterface
{
    public function prepareRoost()
    {
        return "Soft pallet piled up.";
    }

}