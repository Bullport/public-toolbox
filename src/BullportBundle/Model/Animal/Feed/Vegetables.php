<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Feed;

class Vegetables implements FeedInterface
{
    public function prepareFeed()
    {
        return "Fresh veggies prepared.";
    }

}