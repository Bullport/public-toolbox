<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Cage;

class Terrarium implements CageInterface
{
    public function prepareCage()
    {
        return "Preheated terrarium ready.";
    }

}