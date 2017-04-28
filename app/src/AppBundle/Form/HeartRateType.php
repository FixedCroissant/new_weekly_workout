<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HeartRateType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('stuFirstName',TextType::class , ['attr'=>['class'=>'form-control']])->add('stuLastName',TextType::class , ['attr'=>['class'=>'form-control']])->add('emplid',TextType::class,['attr'=>['class'=>'form-control','maxlength'=>'9']])->add('stuGender',ChoiceType::class,array('choices'=>array('male'=>'Male','female'=>'Female'),'multiple'=>false,'expanded'=>true))->add('stuAge')->add('stuRestHeartRate')->add('save',SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\HeartRate'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_heartrate';
    }


}
