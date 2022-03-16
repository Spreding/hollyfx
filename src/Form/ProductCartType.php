<?php

namespace App\Form;

use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductCartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Color', IntegerType::class,[
                'required' => true,
                'label' => false,
                'attr' =>  ['class'=>'colorFormInput'],
                ])

            ->add('Quantity', IntegerType::class, [
                'required' => true,
                'label' => false,
                'attr' =>  ['class'=>'quantityFormInput ruda','value'=>1],
            ])
            ->add('Submit',SubmitType::class,[
                'label'=> 'Ajouter au Panier',
                'attr' =>  ['class'=>'submitFormInput ruda'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
