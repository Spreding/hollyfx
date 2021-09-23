<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName',TextType::class, [
                'label' => 'Votre nom',
                'label_attr' => ['class'=>'roboto'],
                'attr' => ['placeholder' => 'Nom...','class'=>'formInput roboto'],
            ])
            ->add('email',EmailType::class, [
                'label' => 'Votre mail',
                'label_attr' => ['class'=>'roboto'],
                'attr' => ['placeholder' => 'Mail..','class'=>'formInput roboto'],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'label_attr' => ['class'=>'roboto'],
                'attr' => ['rows' => 7,'placeholder' => 'Ecrivez ici..','class'=>'formInput roboto'],
            ])
            ->add('submit',SubmitType::class, [
                'label' => 'Envoyer',
                'attr' =>[ 'class'=>'formButton roboto'],
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}