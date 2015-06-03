<?php
/**
 * Created by PhpStorm.
 * User: oxmo
 * Date: 03.06.15
 * Time: 12:24
 */

namespace BullportBundle\Model\Pizza\Ingredients;

use BullportBundle\Model\Pizza\Ingredients\PizzaCrustAbstract;

class PizzaCrustSpecialCheese extends PizzaCrustAbstract
{
    /**
     * @return float
     */
    public function getCost()
    {
        switch($this->getSize()) {
            case self::S:
                return 2.50;
                break;

            case self::M:
                return 3.00;
                break;

            case self::L:
                return 3.50;
                break;

            case self::XL:
                return 4.00;
                break;

            default:
                throw new \InvalidArgumentException('Unknown Pizza size provided: ' . $this->getSize());
                break;
        }
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return "Extra thin crust, fresh baked with spicy Mozarella cheese in the edge.";
    }

}