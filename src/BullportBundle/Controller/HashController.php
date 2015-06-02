<?php

/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use BullportBundle\Model\Hash\Calculator;
use BullportBundle\Model\Hash\Algorithms\Md5Hash;
use BullportBundle\Model\Hash\Algorithms\Sha256Hash;
use BullportBundle\Model\Hash\Algorithms\Haval256Sha256Hash;
use BullportBundle\Model\Hash\Entity\UserInputData;

class HashController extends Controller
{
    /**
     * @Route("/bullport/hash/", name="bullport_hash_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $userInputData = new UserInputData();
        $userInputData->setText('Please insert any text here...');
        $userInputData->setAlgorithm('md5');

        $hashForm = $this->createFormBuilder($userInputData)
            ->setAction($this->generateUrl('bullport_hash_calculate'))
            ->setMethod('post')
            ->add('text', 'text')
            ->add('algorithm', 'choice', array(
                'choices' => array('md5' => 'MD5', 'sha256' => 'SHA256', 'havNestSha' => 'Haval256 + SHA256'),
                'required' => true,
            ))
            ->add('save', 'submit', array('label' => 'Calculate!'))
            ->getForm();

        return $this->render('bullport/hashIndex.html.twig', array(
            'hashForm' => $hashForm->createView(),
        ));
    }

    /**
     * @param Request $request
     * @Route("/bullport/hash/calculate/{algorithm}", name="bullport_hash_calculate", defaults={"algorithm": "md5"}, requirements={"algorithm": "md5|sha256|bulli"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function calculateAction(Request $request)
    {
        $form = $this->createFormBuilder(new UserInputData())
            ->add('text', 'text')
            ->add('algorithm', 'choice', array(
                'choices' => array('md5' => 'MD5', 'sha256' => 'SHA256', 'havNestSha' => 'Haval256 + SHA256'),
                'required' => true,
            ))
            ->add('save', 'submit', array('label' => 'Calculate!'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()) {
            $calculator = new Calculator();

            $shaHash = new Sha256Hash();
            $md5Hash = new Md5Hash();
            $havHash = new Haval256Sha256Hash();

            $resultArray = array();
            $resultArray['sha256']['name'] = 'SHA256';
            $resultArray['sha256']['hash'] = $calculator->setHashAlgorithm($shaHash)->calculateHash($form->getData()->getText());
            $resultArray['md5']['name'] = 'MD5';
            $resultArray['md5']['hash'] = $calculator->setHashAlgorithm($md5Hash)->calculateHash($form->getData()->getText());
            $resultArray['havNestSha']['name'] = 'HAVAL256 nested SHA256';
            $resultArray['havNestSha']['hash'] = $calculator->setHashAlgorithm($havHash)->calculateHash($form->getData()->getText());
            $resultArray[$form->getData()->getAlgorithm()]['active'] = true;

            return $this->render('bullport/hashCalc.html.twig', array(
                'results' => $resultArray,
                'input' => $form->getData()->getText(),
            ));
        }
        else {
            return $this->redirectToRoute('bullport_hash_index');
        }
    }

}
