<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Hash\Algorithms;


interface HashAlgorithm
{
    /**
     * @param string $userInputValue
     * @return string
     */
    public function calculate($userInputValue);
}