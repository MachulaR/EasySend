<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class CarsForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cars', HiddenType::class)
            ->add('order', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-dark',
                ],
            ])
        ;
    }
}