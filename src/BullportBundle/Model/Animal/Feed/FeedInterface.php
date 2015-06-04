<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Animal\Feed;

interface FeedInterface
{
    /**
     * @return string
     */
    public function prepareFeed();
}