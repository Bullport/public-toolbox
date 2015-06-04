<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Cage;

class DogKennel implements CageInterface
{
    public function prepareCage()
    {
        return "Beautiful dog kennel ready.";
    }

}