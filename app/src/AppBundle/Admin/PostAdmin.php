<?php
// src/AppBundle/Admin/CategoryAdmin.php
namespace AppBundle\Admin;

use AppBundle\Entity\Post;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PostAdmin extends AbstractAdmin
{

    public function toString($object)
    {
        return $object instanceof Post
            ? $object->getTitle()
            : 'Post';  //Shown in the breadcrumb on the create view.
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
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