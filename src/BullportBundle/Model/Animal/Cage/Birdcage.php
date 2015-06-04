<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Cage;

class Birdcage implements CageInterface
{
    /**
     * @return string
     */
    public function prepareCage()
    {
        return "Commodious bird cage prepared.";
    }
}