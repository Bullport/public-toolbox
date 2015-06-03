<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Pizza\Ingredients;

use BullportBundle\Model\Pizza\Ingredients\PizzaIngredientInterface;

abstract class PizzaCrustAbstract implements PizzaIngredientInterface
{
    const S = 20;
    const M = 23;
    const L = 26;
    const XL = 30;

    /**
     * @var int
     */
    protected $size;

    /**
     * @param int $pizzaSize
     */
    public function __construct($pizzaSize = null)
    {
        if (is_int($pizzaSize)) {
            $this->setSize($pizzaSize);
        }
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $pizzaSize
     * @return PizzaCrustAbstract
     */
    public function setSize($pizzaSize)
    {
        switch($pizzaSize) {
            case self::S:
            case self::M:
            case self::L:
            case self::XL:
                $this->size = $pizzaSize;
                return $this;
                break;

            default:
                throw new \InvalidArgumentException('Unknown Pizza size provided: ' . intval($pizzaSize));
                break;
        }
    }

    /**
     * @return null
     */
    public function getPizza()
    {
        return null;
    }
}