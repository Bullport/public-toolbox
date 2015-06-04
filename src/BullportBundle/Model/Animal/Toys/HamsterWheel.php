<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Toys;

class HamsterWheel implements ToyInterface
{
    public function provideToy()
    {
        return "Commodious, non-squeaking hamster wheel added.";
    }

}