<?php

namespace BullportBundle\Controller;

use BullportBundle\Model\Pizza\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use BullportBundle\Model\Pizza\Entity\Pizza;
use BullportBundle\Model\Pizza\Entity\PizzaType;
use BullportBundle\Model\Pizza\Ingredients;
use BullportBundle\Model\Pizza\Observers;
use Symfony\Component\Serializer\Tests\Model;

class PizzaController extends Controller
{
    /**
     * @Route("/bullport/pizza", name="bullport_pizza_index")
     * @Template("BullportBundle:Pizza:index.html.twig")
     */
    public function indexAction()
    {
        $pizzaBase = new \ReflectionClass('BullportBundle\Model\Pizza\Ingredients\PizzaCrustAbstract');

        $orderForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('bullport_pizza_calculate'))
            ->setMethod('post')
            ->add('ingredients', 'choice', array(
                'multiple' => true,
                'expanded' => true,
                'choices' => array(
                    'Cheese' => 'Special Cheese Mix',
                    'Ham' => 'Ham',
                    'Mushrooms' => 'Fresh Mushrooms',
                    'Paprika' => 'Red Paprika',
                    'Pineapple' => 'Imported Pineapple',
                    'Salami' => 'Smoked Salami',
                    'Tomato' => 'Tomatoes',
                ),
            ))
            ->add('sauce', 'choice', array(
                'choices' => array(
                    'SauceTomato' => 'Tomato (aromatic)',
                    'SauceHollandaise' => 'Hollandaise (creamy)',
                    'SauceCurry' => 'Curry (yellow)',
                )
            ))
            ->add('size', 'choice', array(
                'choices' => array_flip($pizzaBase->getConstants()),
                'required' => true,
            ))
            ->add('crust', 'choice', array(
                'required' => true,
                'choices' => array(
                    'PizzaCrustAmerican' => 'American (2 inches high)',
                    'PizzaCrustItalian' => "Italian (Extra thin)",
                    'PizzaCrustSpecialCheese' => "Thin crust with cheese in the edge",
                )
            ))
            ->add('save', 'submit', array('label' => 'Calculate!'))
            ->getForm();

        return array('orderForm' => $orderForm->createView());
    }

    /**
     * @param Request $request
     * @Route("/bullport/pizza/calculate", name="bullport_pizza_calculate")
     * @Template("BullportBundle:Pizza:calculate.html.twig")
     * @return array
     */
    public function calculateAction(Request $request)
    {
        $formData = $request->get('form');

        try {
            $pizzaCrust = 'BullportBundle\\Model\\Pizza\\Ingredients\\' . $formData['crust'];
            $pizza = new $pizzaCrust();
            $pizza->setSize($formData['size']);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException('Unknown Pizza type: ' . $formData['crust']);
        }

        try {
            $pizzaSauce = 'BullportBundle\\Model\\Pizza\\Ingredients\\' . $formData['sauce'];
            $pizza = new $pizzaSauce($pizza);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException('Unknown Pizza sauce: ' . $formData['sauce']);
        }

        if( array_key_exists('ingredients', $formData) &&
            is_array($formData['ingredients'])) {
            foreach($formData['ingredients'] as $ingredient) {
                try {
                    $pizzaIngredient = 'BullportBundle\\Model\\Pizza\\Ingredients\\' . $ingredient;
                    $pizza = new $pizzaIngredient($pizza);
                } catch (\Exception $e) {
                    throw new \InvalidArgumentException('Unknown Pizza ingredient: ' . $ingredient);
                }
            }
        }

        $order = new Order($pizza);

        $order->attach(new Observers\Kitchen());
        $order->attach(new Observers\Cashier());
        $order->attach(new Observers\InvoicePrinter());

        $order->notify();

        return array();
    }

}
