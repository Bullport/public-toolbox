<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Pizza\Ingredients;

use BullportBundle\Model\Pizza\Ingredients\PizzaIngredientInterface;

abstract class PizzaFilling implements PizzaIngredientInterface
{
    /**
     * @var PizzaIngredientInterface
     */
    protected $pizza;

    /**
     * @param PizzaIngredientInterface $pizza
     * @return PizzaFilling
     */
    public function __construct(PizzaIngredientInterface $pizza)
    {
        $this->pizza = $pizza;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->pizza->getSize();
    }

    /**
     * @return PizzaIngredientInterface
     */
    public function getPizza()
    {
        return $this->pizza;
    }

}