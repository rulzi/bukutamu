<?php
namespace Afandi\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class BukuTamuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nama', TextType::class)
            ->add('pesan', TextareaType::class)
            ->add('imageFile', FileType::class, array('required' => false))
            ->add('save', SubmitType::class, array('label' => 'Save'))
            ->add('reset', ResetType::class, array('label' => 'Reset'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
	{
	    $resolver->setDefaults(array(
	        'data_class' => 'Afandi\MainBundle\Entity\BukuTamu',
            'validation_groups' => false
	    ));
	}
}