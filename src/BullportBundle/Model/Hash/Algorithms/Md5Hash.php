<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Hash\Algorithms;

class Md5Hash implements HashAlgorithm
{
    /**
     * @param string $userInputValue
     * @return string
     */
    public function calculate($userInputValue)
    {
        return hash("md5", $userInputValue, false);
    }
}