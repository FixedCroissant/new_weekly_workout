<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Task;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TaskController extends Controller
{
    /**
     * @Route("/new_task", name="new_task",)
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function newAction(Request $request)
        {
                //create a task and give it some dummy data for this example.
                $task = $task = new Task();
                $task->setTaskName('Write a test post');
                $task->setDueDate(new \DateTime('next month'));

                $form = $this->createFormBuilder($task)
                // If you use PHP 5.3 or 5.4 you must use
                ->add('taskName', 'Symfony\Component\Form\Extension\Core\Type\TextType',array('required'=>true))
                ->add('dueDate', DateType::class,array('required'=>false))
                ->add('save', SubmitType::class, array('label' => 'Create Post'))
                ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // $form->getData() holds the submitted values
                // but, the original `$task` variable has also been updated
                $task = $form->getData();

                // ... perform some action, such as saving the task to the database
                // for example, if Task is a Doctrine entity, save it!
                 $em = $this->getDoctrine()->getManager();
                 $em->persist($task);
                 $em->flush();

                return $this->redirectToRoute('task_success');
            }


            return $this->render('default/new.html.twig', array(
                'form' => $form->createView(),
            ));


        }

        /**
         * @Route("/successful_task",name="task_success")
         */
        public function success(){
            return $this->render('default/success.html.twig',array(

            ));
        }

}