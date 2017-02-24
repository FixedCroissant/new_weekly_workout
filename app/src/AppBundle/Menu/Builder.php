<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;


class Builder implements ContainerAwareInterface
{

    use ContainerAwareTrait;

        public function mainMenu(FactoryInterface $factory, array $options)
            {
            $menu = $factory->createItem('root');

            $menu->addChild('Home',array('route'=>'homepage'));

            // access services from the container!
            $em = $this->container->get('doctrine')->getManager();

                // findMostRecent and Blog are just imaginary examples
            $blog = $em->getRepository('AppBundle:Product')->findAll();

                if(!$blog) {
                    throw new \Doctrine\ORM\NoResultException;
                }

            //var_dump($blog);

            /*$menu->addChild('Latest Blog Post', array(
                    'route' => 'admin_app_post_show',
                    'routeParameters' => array('id' => $blog->getId())
            ));*/


            // ... add more children

            return $menu;



            }

}