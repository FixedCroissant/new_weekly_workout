<?php

namespace AppBundle\Controller;

//Get Doctrine Entities
use AppBundle\Entity\HeartRate;

use AppBundle\Form\HeartRateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class HeartRateController extends Controller
{


    /**
     * @Route("/heartrate/index",name="heartrate_index")
     */
    public function index()
    {
        //Find all current heart rates that are in the system for the given logged in person.

        //Get Logged In user.
        $user = $this->get('security.token_storage')->getToken()->getUser();

        //Get all heart rates.
        $myHeartRates_Repository = $this->getDoctrine()->getRepository('AppBundle:HeartRate');
        //Get Find All that match logged in user's ID.
        $myHeartRates = $myHeartRates_Repository->findByUnityID('jjwill10');

        return $this->render('AppBundle:weekly_workout_student:\heart_rate_calculator\index.html.twig',array('listOfHeartRateCalculations'=>$myHeartRates));
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

        //Handle error messages.
       if(false === $form->isValid()){
            //get error of the field within the HeartRate entity.
           //$error = $form['stuAge']->getErrors();
           return $this->render('AppBundle:weekly_workout_student:\heart_rate_calculator\create.html.twig',array('form'=>$form->createView(),'errors'=>$form->getErrors()));
       }

       //Form is valid and passes Validation constraints.
        if($form->isSubmitted() && $form->isValid())
        {
         $newHeartRateInformation = $form->getData();
         // ... perform some action, such as saving the heart rate to the database.
         // for example, if HeartRate is a Doctrine entity, save it!
         $em = $this->getDoctrine()->getManager();
        //Get Current Sign-In User ID.
        //See this: https://stackoverflow.com/questions/7680917/how-do-i-get-the-entity-that-represents-the-current-user-in-symfony2
        $user =  $this->get('security.token_storage')->getToken()->getUser();
        //Get the User ID from the table.
        $userID = $user->getID();
        //Get UnityID...from the admin panel.
        $unityID = $user->getBiography();
        //Set the user id.
        $newHeartRate->setUserID($userID);
        //Set the unity id
        $newHeartRate->setUnityID($unityID);

        //Notify doctrine that a save will be occurring soon.
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
