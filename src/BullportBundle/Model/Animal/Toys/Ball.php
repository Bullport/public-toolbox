<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Toys;

class Ball implements ToyInterface
{
    public function provideToy()
    {
        return "Bite safe ball added.";
    }

}