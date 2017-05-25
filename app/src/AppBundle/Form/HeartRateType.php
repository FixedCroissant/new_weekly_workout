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
        $builder
            ->add('stuAge',TextType::class,array('label'=>'Age:','attr'=>['class'=>'form-control','maxlength'=>'2','label'=>'Age:','required'=>false]))
            ->add('stuRestHeartRate',TextType::class,array('label'=>'Resting Heart Rate:','attr'=>['class'=>'form-control','maxlength'=>'3']))
            ->add('stuGender',ChoiceType::class,array('label'=>'Gender:','choices'=>array('male'=>'Male','female'=>'Female'),'multiple'=>false,'expanded'=>false))

            ->add('save',SubmitType::class,array('attr'=>['class'=>'btn']));
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
