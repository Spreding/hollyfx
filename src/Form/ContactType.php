<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class, [
                'label'=> false,
                'attr' => ['placeholder' => 'Nom...', 'class' => 'formInput ruda'],
            ])
            ->add('email', EmailType::class, [
                'label'=> false,
                'attr' => ['placeholder' => 'Mail..', 'class' => 'formInput ruda'],
            ])
            ->add('phoneNumber', TelType::class, [
                'label'=> false,
                'attr' => ['placeholder' => 'Téléphone...', 'class' => 'formInput ruda'],
            ])
            ->add('object', TextType::class, [
                'label'=> false,
                'attr' => ['placeholder' => 'Objet du message..', 'class' => 'formInput ruda'],
            ])
            ->add('message', TextareaType::class, [
                'label'=> false,
                'attr' => ['rows' => 7, 'placeholder' => 'Ecrivez ici..', 'class' => 'formInput ruda'],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => ['class' => 'formButton roboto'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}