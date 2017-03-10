<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;


class MenuBuilder implements ContainerAwareInterface
{

    use ContainerAwareTrait;

            /*$menu = $factory->createItem('root');
            $menu->setChildrenAttribute('class','nav pull-right');


            $menu->addChild('Home',array('route'=>'homepage'))
                ->setExtra('translation_domain',false)
                ->setAttribute('dropdown',true);


            // access services from the container!
            $em = $this->container->get('doctrine')->getManager();

                // findMostRecent and Blog are just imaginary examples
            $blog = $em->getRepository('AppBundle:Post')->findAll();

                if(!$blog) {
                    throw new \Doctrine\ORM\NoResultException;
                }

                foreach($blog as $myBlog) {
                                    $menu->addChild($myBlog->getTitle(), array(
                                                        'route' => 'admin_app_post_show',
                                                        'routeParameters' => array('id' => $myBlog->getId())
                                    ))->setExtra('translation_domain',false)->setAttribute('dropdown',true)->setAttribute('divider_append',true );
                }*/

            // ... add more children


                public function mainMenu(FactoryInterface $factory, array $options)
            {
                $menu = $factory->createItem('root');
                $menu->setChildrenAttribute('class', 'nav navbar-nav');

                $menu->addChild('Menu', array('uri' => '#menu-toggle'))
                    ->setExtra('icon', 'fa fa-list')
                    ->setAttribute('id','menu-toggle')
                    ->setExtra('translation_domain',false);

                /*$menu->addChild('Projects', array('uri' => '#'))
                    ->setExtra('icon', 'fa fa-list')
                    ->setExtra('translation_domain',false);*/

                /*$menu->addChild('Employees', array('uri' => '#'))
                    ->setExtra('icon', 'fa fa-group')
                    ->setExtra('translation_domain',false);*/

                return $menu;
            }

                public function userMenu(FactoryInterface $factory, array $options)
            {
                $menu = $factory->createItem('root');
                $menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');

                /*
                You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.*/

                if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN', 'ROLE_USER'))) {} // Check if the visitor has any authenticated roles

                //Checked logged in users.
                $securityContext = $this->container->get('security.authorization_checker');
                        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                            // authenticated REMEMBERED, FULLY will imply REMEMBERED (NON anonymous)
                            // Get username of the current logged in user
                            $username = $this->container->get('security.context')->getToken()->getUser()->getUsername();
                            $routeName = 'fos_user_security_logout';
                            $label="Logout";

                        }else{
                            $username="Hi Visitor!";
                            $routeName = "";
                            $label="Login";
                        }
                $menu->addChild('User', array('label' => $username))
                    ->setExtras(array(
                        'dropdown' => true,
                        'icon' => 'fa fa-user',
                        'translation_domain'=>'false'
                    ));

                $menu['User']->addChild($label,array('route'=>$routeName));

                /*$menu['User']->addChild('Edit profile', array('uri' => '#'))
                    ->setExtra('icon', 'fa fa-edit');*/

                return $menu;
            }

}