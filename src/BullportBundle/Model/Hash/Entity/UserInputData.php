<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Hash\Entity;

class UserInputData
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $algorithm;

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return UserInputData
     */
    public function setText($text)
    {
        $this->text = strval($text);
        return $this;
    }

    /**
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * @param string $algorithm
     * @return UserInputData
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = strval($algorithm);
        return $this;
    }
}