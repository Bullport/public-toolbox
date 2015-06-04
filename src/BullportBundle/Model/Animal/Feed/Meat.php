<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Feed;

class Meat implements FeedInterface
{
    public function prepareFeed()
    {
        return "Fresh meat prepared.";
    }

}