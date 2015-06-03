<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Pizza\Observers;

use SplSubject;
use BullportBundle\Model\Pizza\Ingredients\PizzaIngredientInterface;

class Kitchen implements \SplObserver
{

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     * @param SplSubject $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @return void
     */
    public function update(SplSubject $subject)
    {
        //Tell the kitchen what customer had ordered
        echo "<br/>Kitchen notified. Needed ingredients: ";
        echo "<ul>";
        $ingredients = function ($pizza) use (&$ingredients) {
            if(!is_object($pizza)) return;
            echo "<li>" . $pizza->getDescription() . "</li>";
            return $ingredients($pizza->getPizza());
        };
        echo $ingredients($subject->getPizza());
        echo "</ul>";
    }

}