<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Pizza\Ingredients;

use BullportBundle\Model\Pizza\Ingredients\PizzaCrustAbstract;

class PizzaCrustAmerican extends PizzaCrustAbstract
{
    /**
     * @return float
     */
    public function getCost()
    {
        switch($this->getSize()) {
            case self::S:
                return 1.50;
                break;

            case self::M:
                return 2.00;
                break;

            case self::L:
                return 2.50;
                break;

            case self::XL:
                return 3.00;
                break;

            default:
                throw new \InvalidArgumentException('Unknown Pizza size provided: ' . intval($pizzaSize));
                break;
        }
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return "Extra big crust, fresh baked";
    }

}