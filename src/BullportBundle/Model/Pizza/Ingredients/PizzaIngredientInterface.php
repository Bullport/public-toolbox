<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Pizza\Ingredients;


interface PizzaIngredientInterface
{
    /**
     * @return float
     */
    public function getCost();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return int
     */
    public function getSize();

}