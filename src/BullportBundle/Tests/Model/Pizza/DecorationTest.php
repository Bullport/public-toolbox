<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Tests;

use BullportBundle\Model\Pizza\Ingredients;

class DecorationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $ingredients = array();

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
        $this->ingredients = array(
            'Cheese',
            'Ham',
            'Mushrooms',
            'Paprika',
            'Pineapple',
            'Salami',
            'SauceHollandaise',
            'SauceTomato',
            'SauceCurry',
            'Tomato',
        );
    }

    /**
     * @dataProvider dataProviderCrustSizes
     */
    public function testIfDecoratorRaisesPrice($size)
    {
        $crust = new Ingredients\PizzaCrustItalian($size);
        $previousPrice = 0;

        foreach($this->ingredients AS $ingredient) {
            $decoratorClassName = 'BullportBundle\Model\Pizza\Ingredients\\' . $ingredient;

            $crust = new $decoratorClassName($crust);
            $this->assertGreaterThan($previousPrice, $crust->getCost());
            $previousPrice = $crust->getCost();
        }

    }
}
