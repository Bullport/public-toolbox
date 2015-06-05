<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Tests;

use BullportBundle\Model\Pizza\Ingredients;

class SauceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $ingredient = array();

    /**
     * @var array
     */
    protected $previousPrice = array();

    /**
     * @return array
     */
    public function dataProviderCrustSizes()
    {
        return array(
            array(Ingredients\PizzaCrustAbstract::S),
            array(Ingredients\PizzaCrustAbstract::M),
            array(Ingredients\PizzaCrustAbstract::L),
            array(Ingredients\PizzaCrustAbstract::XL),
        );
    }

    public function setUp()
    {
        $crust = new Ingredients\PizzaCrustItalian();

        $this->ingredient['SauceHollandaise'] = new Ingredients\SauceHollandaise($crust);
        $this->ingredient['SauceTomato'] = new Ingredients\SauceHollandaise($crust);
        $this->ingredient['SauceCurry'] = new Ingredients\SauceHollandaise($crust);

        $this->ingredient['Cheese'] = new Ingredients\Cheese($crust);
        $this->ingredient['Ham'] = new Ingredients\Ham($crust);
        $this->ingredient['Mushrooms'] = new Ingredients\Mushrooms($crust);
        $this->ingredient['Paprika'] = new Ingredients\Paprika($crust);
        $this->ingredient['Pinaapple'] = new Ingredients\Pineapple($crust);
        $this->ingredient['Salami'] = new Ingredients\Salami($crust);
        $this->ingredient['Tomato'] = new Ingredients\Tomato($crust);

        foreach($this->ingredient AS $ingredientName => $ingredientInstance) {
            $this->previousPrice[$ingredientName] = 0;
        }
    }

    /**
     * @dataProvider dataProviderCrustSizes
     */
    public function testIfSaucesHaveAscendingPrices($size)
    {
        foreach($this->ingredient as $ingredientName => $ingredientInstance) {
            $ingredientInstance->getPizza()->setSize($size);
            $this->assertGreaterThan(
                $this->previousPrice[$ingredientName],
                $ingredientInstance->getCost()
            );
            $this->previousPrice[$ingredientName] = $ingredientInstance->getCost();
        }
    }

}
