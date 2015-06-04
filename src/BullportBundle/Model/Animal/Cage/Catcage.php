<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Cage;

class Catcage implements CageInterface
{
    public function prepareCage()
    {
        return "Cat cage ready.";
    }

}