<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //Find information from database
        // access services from the container!
        $em = $this->container->get('doctrine')->getManager();

        // findMostRecent and Blog are just imaginary examples
        $product = $em->getRepository('AppBundle:Product')->findAll();
        //End find information from database

        // replace this example code with whatever you need
        return $this->render('default/layout.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'product'=>$product
        ));
    }
}
