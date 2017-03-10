<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



class WorkoutController extends Controller
{

        /**Sidebar
         * @return Response
         */
        public function showStudentSideBarAction()
        {
            return $this->render('AppBundle:weekly_workout_student:student_info.html.twig', array());
        }

        /**
         * See Workout Index
         * @Route("/workout/index",name="workout_list")
         */
        public function addWorkoutGetInformationAction(){
            return $this->render('AppBundle:weekly_workout_student:\view_workout\index.html.twig',array());
        }
}