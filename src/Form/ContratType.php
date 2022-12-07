<?php

namespace App\Form;

use App\Entity\Contrat;
use App\Entity\Document;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContratType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',TextType::class, [
                'required'=>true
            ])
            ->add('type',TextType::class, [
                'required'=>true
            ])
            ->add('dateDebut',DateType::class,[
                    'required'=>true
                ]
            )
            ->add('dateFin',DateType::class,[
                'required'=>true
            ])
            ->add('salaire',NumberType::class,[
                    'required'=>true
                ]
            )
            ->add('document',EntityType::class,[
                'label' => 'Document',
                'class' => Document::class,
                'choice_label' => 'nom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contrat::class,
        ]);
    }
}
