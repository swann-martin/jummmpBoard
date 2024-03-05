<?php

namespace App\Form;

use App\Entity\Offre;
use App\Entity\Service;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => "Nom de l'offre",
                'attr' => [
                    'class' => "border-2 border-blue-500 rounded-lg p-2 text-gray-800"
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => "Description de l'offre",
                'attr' => [
                    'class' => "border-2 border-blue-500 rounded-lg p-2 text-gray-800"
                ]
            ])
            ->add('salaire', TextType::class, [
                'label' => "Salaire de l'offre",
                'attr' => [
                    'class' => "border-2 border-blue-500 rounded-lg p-2 text-gray-800"
                ]
            ])
            ->add('service', EntityType::class, [
                'class' => Service::class,
                'choice_label' => 'nom',
                'label' => "Le service de l'offre",
                'attr' => [
                    'class' => "border-2 border-blue-500 rounded-lg p-2 text-gray-800"
                ]
            ])
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'label' => "Tags de l'offre",
                'attr' => [
                    'class' => "border-2 border-blue-500 rounded-lg p-2 text-gray-800"
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Créer l'offre",
                'attr' => [
                    'class' => "inline-block bg-[#feb523] rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
