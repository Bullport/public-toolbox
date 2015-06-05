<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Tests;

use BullportBundle\Model\Pizza\Ingredients;

class CrustTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $crust = array();

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
        $this->crust['PizzaCrustAmerican'] = new Ingredients\PizzaCrustAmerican();
        $this->crust['PizzaCrustItalian'] = new Ingredients\PizzaCrustItalian();
        $this->crust['PizzaCrustSpecialCheese'] = new Ingredients\PizzaCrustSpecialCheese();

        $this->previousPrice['PizzaCrustAmerican'] = 0;
        $this->previousPrice['PizzaCrustItalian'] = 0;
        $this->previousPrice['PizzaCrustSpecialCheese'] = 0;
    }

    /**
     * @dataProvider dataProviderCrustSizes
     */
    public function testIfCrustsHaveAscendingPrices($size)
    {
        foreach($this->crust as $crustName => $crustInstance) {
            $crustInstance->setSize($size);
            $this->assertGreaterThan(
                $this->previousPrice[$crustName],
                $crustInstance->getCost()
            );
            $this->previousPrice[$crustName] = $crustInstance->getCost();
        }
    }
}
