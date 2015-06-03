<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Model\Pizza\Observers;


use SplSubject;

class Cashier implements \SplObserver
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
        //Tell the cashier the price that our customer has to pay
        echo "<br/>Cashier notified: Our customer has to pay " . number_format($subject->getPizza()->getCost(), 2) . " Euro.";
    }
}