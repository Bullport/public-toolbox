<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Toys;

class Mirror implements ToyInterface
{
    public function provideToy()
    {
        return "Spick'n span polished mirror added.";
    }

}