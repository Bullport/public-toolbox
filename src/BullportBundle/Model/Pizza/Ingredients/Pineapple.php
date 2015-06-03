<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Pizza\Ingredients;


class Pineapple extends PizzaFilling
{
    /**
     * @return float
     */
    public function getCost()
    {
        switch($this->getSize()) {
            case PizzaCrustAbstract::S:
                return $this->pizza->getCost() + 0.80;
                break;

            case PizzaCrustAbstract::M:
                return $this->pizza->getCost() + 1.10;
                break;

            case PizzaCrustAbstract::L:
                return $this->pizza->getCost() + 1.50;
                break;

            case PizzaCrustAbstract::XL:
                return $this->pizza->getCost() + 2.30;
                break;

            default:
                throw new \InvalidArgumentException('Unknown Pizza size provided: ' . $this->getSize());
                break;
        }
    }
    /**
     * @return string
     */public function getDescription()
    {
        return "Handpicked pineapple, very sweet and juicy.";
    }

}