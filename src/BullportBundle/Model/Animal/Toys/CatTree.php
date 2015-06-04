<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Toys;

class CatTree implements ToyInterface
{
    public function provideToy()
    {
        return "Cat tree for climbing and nail care added.";
    }

}