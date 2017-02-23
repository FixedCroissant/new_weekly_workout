<?php
// src/AppBundle/Admin/CategoryAdmin.php
namespace AppBundle\Admin;

use AppBundle\Entity\BlogPost;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogPostAdmin extends Admin
{

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post';  //Shown in the breadcrumb on the create view.
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        /*$formMapper
            ->add('title', 'text')
            ->add('body', 'textarea')
            ->add('category','entity',array('class'=>'AppBundle\Entity\Category','property'=>'name'));*/

        $formMapper
            ->with('Content',array('class'=>'col-md-9'))
            ->add('title', 'text')
            ->add('body', 'textarea')
            ->end()

            ->with('Meta data',array('class'=>'col-md-3'))
            ->add('category','entity',array('class'=>'AppBundle\Entity\Category','property'=>'name'))
            ->end();

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('category', null, array(), 'entity', array(
                'class'    => 'AppBundle\Entity\Category',
                'property' => 'name',
            ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('category.name')
            ->add('draft');
    }
}