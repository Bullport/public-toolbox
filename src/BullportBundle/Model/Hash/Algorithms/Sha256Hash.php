<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Hash\Algorithms;

class Sha256Hash implements HashAlgorithm
{
    /**
     * @param string $userInputValue
     * @return string
     */
    public function calculate($userInputValue)
    {
        return hash("sha256", $userInputValue, false);
    }
}