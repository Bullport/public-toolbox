<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Hash;

use BullportBundle\Model\Hash\Algorithms\HashAlgorithm;

class Calculator
{
    /**
     * @var HashAlgorithm
     */
    private $hashAlgorithm;

    /**
     * @param HashAlgorithm $hashAlgorithm
     * @return Calculator
     */
    public function setHashAlgorithm(HashAlgorithm $hashAlgorithm)
    {
        $this->hashAlgorithm = $hashAlgorithm;
        return $this;
    }

    /**
     * @param mixed $userInput
     * @return string
     */
    public function calculateHash($userInput)
    {
        return $this->hashAlgorithm->calculate($userInput);
    }
}