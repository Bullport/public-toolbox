<?php

/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Controller;

use BullportBundle\Model\Animal\Generators\BirdGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Tests\Model;
use BullportBundle\Model\Animal\Generators;

class AnimalController extends Controller
{
    /**
     * @Route("bullport/animal", name="bullport_animal_index")
     * @Template("BullportBundle:Animal:index.html.twig")
     * @return array
     */
    public function indexAction()
    {
        $animalForm = $this->createFormBuilder()
            ->setAction($this->generateUrl('bullport_animal_prepare'))
            ->setMethod('post')
            ->add('species', 'choice', array(
                'choices' => array(
                    'Bird' => 'Bird',
                    'Cat' => 'Cat',
                    'Dog' => 'Dog',
                    'Mouse' => 'Mouse or Hamster',
                    'Turtle' => 'Turtle',
                )
            ))
            ->add('save', 'submit', array('label' => 'Create an environment!'))
            ->getForm();

        return array('animalForm' => $animalForm->createView());
    }

    /**
     * @param Request $request
     * @Route("bullport/animal/prepare", name="bullport_animal_prepare")
     * @Template("BullportBundle:Animal:prepareDwelling.html.twig")
     * @return array
     */
    public function prepareDwellingAction(Request $request)
    {
        $formData = $request->get('form');

        if($formData === null || !array_key_exists('species', $formData)) {
            return $this->redirectToRoute('bullport_animal_index');
        }

        $generatorName = 'BullportBundle\\Model\\Animal\\Generators\\' . $formData['species'] . 'Generator';
        try {
            $generator = new $generatorName();
        } catch (Exception $e) {
            throw new \InvalidArgumentException('Unknown species provided: ' . $formData['species']);
        }

        $creationResult = array();

        $cage = $generator->createCage();
        $creationResult['cage'] = $cage->prepareCage();

        $feed = $generator->createFeed();
        $creationResult['feed'] = $feed->prepareFeed();

        $roost = $generator->createRoost();
        $creationResult['roost'] = $roost->prepareRoost();

        $toys = $generator->createToy();
        $creationResult['toys'] = $toys->provideToy();

        return array('creationResult' => $creationResult);
    }

}
