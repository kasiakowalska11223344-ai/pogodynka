<?php

namespace App\Form;

use App\Entity\Measurement;
use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Date', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('Temperature', NumberType::class, [
                'scale' => 2,
            ])
            ->add('Percipation', NumberType::class, [
                'scale' => 2,
            ])
            ->add('Pressure', NumberType::class, [
                'scale' => 2,
            ])
            ->add('Cloudiness', IntegerType::class)
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'Name',
                'placeholder' => 'Select location',
            ]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
