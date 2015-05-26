<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Hash\Algorithms;

class Haval256Sha256Hash implements HashAlgorithm
{
    /**
     * @param string $userInputValue
     * @return string
     */
    public function calculate($userInputValue)
    {
        $firstCycleHash = hash("Haval256,5", $userInputValue, false);
        return hash("sha256", $firstCycleHash, false);
    }
}