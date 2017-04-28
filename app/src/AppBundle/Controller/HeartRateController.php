<?php

namespace AppBundle\Controller;

//Get Doctrine Entities
use AppBundle\Entity\HeartRate;

use AppBundle\Form\HeartRateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HeartRateController extends Controller
{


    /**
     * @Route("/heartrate/index",name="heartrate_index")
     */
    public function index()
    {


        return $this->render('AppBundle:weekly_workout_student:\heart_rate_calculator\index.html.twig',array('listOfWorkouts'=>''));
    }

    /**
     * @Route("/heartrate/create",name="heartrate_create")
     */
    public function create(Request $request)
    {
        //Render Separate class form from /Form/HeartRateType
        $newHeartRate = new HeartRate();
        $form = $this->createForm(HeartRateType::class,$newHeartRate);

        /**
         * HANDLE REQUEST
         */
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
         $newHeartRateInformation = $form->getData();
         // ... perform some action, such as saving the heart rate to the database.
         // for example, if HeartRate is a Doctrine entity, save it!
         $em = $this->getDoctrine()->getManager();
         $em->persist($newHeartRateInformation);
         //Save the information.
         $em->flush();

         //Add Flash Message.
         $this->addFlash('notice', 'Your heartrate has been added!');

         //Return route;
         return $this->redirectToRoute('heartrate_index');
        }
        return $this->render('AppBundle:weekly_workout_student:\heart_rate_calculator\create.html.twig',array('form'=>$form->createView()));
    }
}
