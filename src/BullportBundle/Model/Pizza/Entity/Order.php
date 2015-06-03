<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Pizza\Entity;

use BullportBundle\Model\Pizza\Ingredients\PizzaIngredientInterface;

use SplObserver;

class Order implements \SplSubject
{
    /**
     * @var \SplObjectStorage
     */
    protected $splObservers;

    /**
     * @var PizzaIngredientInterface
     */
    protected $pizza = null;

    /**
     * @param PizzaIngredientInterface $pizza
     * @return Order
     */
    public function __construct(PizzaIngredientInterface $pizza)
    {
        $this->pizza = $pizza;
        $this->splObservers = new \SplObjectStorage();
        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Attach an SplObserver
     * @link http://php.net/manual/en/splsubject.attach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     * @return void
     */
    public function attach(SplObserver $observer)
    {
        $this->splObservers->attach($observer);
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Detach an observer
     * @link http://php.net/manual/en/splsubject.detach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to detach.
     * </p>
     * @return void
     */
    public function detach(SplObserver $observer)
    {
        $this->splObservers->detach($observer);
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Notify an observer
     * @link http://php.net/manual/en/splsubject.notify.php
     * @return void
     */
    public function notify()
    {
        foreach($this->splObservers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @param PizzaIngredientInterface $pizza
     * @return Order
     */
    public function setPizza(PizzaIngredientInterface $pizza)
    {
        $this->pizza = $pizza;
        return $this;
    }

    /**
     * @return PizzaIngredientInterface
     */
    public function getPizza()
    {
        return $this->pizza;
    }
}