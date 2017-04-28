<?php


namespace AppBundle\Controller;

//Get Workout Entity.
use AppBundle\Entity\Workout;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;



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
        public function WorkoutList(){
            //Get Current Workouts.
            $workouts = $this->getDoctrine()
                ->getRepository('AppBundle:Workout')
                //Get Everything in the system.
                ->findAll();

            return $this->render('AppBundle:weekly_workout_student:\view_workout\index.html.twig',array('listOfWorkouts'=>$workouts));
        }

    /**
     * See Workout Index
     * @Route("/workout/create",name="workout_create")
     */
    public function addWorkoutGetInformationAction(Request $request){

        //Create new form
        //New Workout
        $newWorkout = new Workout();
        //Set Workoutdate for Right now.
        $newWorkout->setWorkoutDate(new \DateTime('now'));

        $form = $this->createFormBuilder($newWorkout)

            //Add category.
            //->add('category','entity',array('class'=>'AppBundle\Entity\Category','property'=>'name','attr'=>['class'=>'form-control']))
            ->add('workout_date', DateType::class,array('required'=>false))
            ->add('stu_first_name',TextType::class,array('attr'=>['class'=>'form-control']))
            ->add('stu_last_name',TextType::class,array('attr'=>['class'=>'form-control']))
            ->add('stu_unity_id',TextType::class,array('attr'=>['class'=>'form-control']))
            ->add('pre_exercise_hr',TextType::class,array('attr'=>['class'=>'form-control']))
            ->add('peak_exercise_hr',TextType::class,array('attr'=>['class'=>'form-control']))
            ->add('post_exercise_hr',TextType::class,array('attr'=>['class'=>'form-control']))
            ->add('pushup_number',ChoiceType::class,array('choices'=>range(0,200),'attr'=>['class'=>'form-control']))
            ->add('pushup_type',ChoiceType::class,array('choices'=>array(''=>'Select Type','std'=>'standard','mod'=>'modified'),'attr'=>['class'=>'form-control']))
            ->add('crunches_number',ChoiceType::class,array('choices'=>range(0,200),'attr'=>['class'=>'form-control']))
            ->add('workout_type',ChoiceType::class,array('choices'=>array(''=>'Select Type','aerobics'=>'aerobics','walking'=>'walking','running'=>'running','cycling'=>'cycling'),'attr'=>['class'=>'form-control']))
            ->add('workout_length',TextType::class,array('attr'=>['class'=>'form-control']))
            ->add('save',SubmitType::class,['label'=>'Add Your Workout','attr'=>['class'=>'btn-sm btn-primary']])
            ->getForm();

        /***
         * HANDLE REQUEST
         */
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $newWorkout = $form->getData();
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($newWorkout);
            //Save the data.
            $em->flush();

            //Add Flash Message
            $this->addFlash('notice','Your workout has been added!');

            //Return Message.
            return $this->redirectToRoute('workout_list');

        }
        /**
         * END HANDLING THIS REQUEST
         */
        return $this->render('AppBundle:weekly_workout_student:\view_workout\create.html.twig',array('form'=>$form->createView()));
    }

    /**
     * Delete a specific workout.
     * @Route("/workout/delete/{specificID}",defaults={"specificID"=0},name="workout_delete")
     * @Method("Get")
     * @return string
     */
    public function deleteWorkout($specificID){
        //Delete a workout in the system.
        //Get Current Workouts.
        $em = $this->getDoctrine()->getManager();
        $selectedWorkout = $em ->getRepository('AppBundle:Post')
                    ->find($specificID);
        //Remove the item
        $em->remove($selectedWorkout);
        //Finally fully delete the item from the database.
        $em->flush();
        //Flash a message to the user.
        $this->addFlash('notice','Your workout was removed!');

        //Go back to the route that displays all the workouts.
        return $this->redirectToRoute('workout_list');
    }
}