<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add("email", EmailType::class, array("label" => "fields.email"))
            ->add("password", RepeatedType::class, array(
                "type" => "password",
                "first_options" => array("label" => "fields.password"),
                "second_options" => array("label" => "fields.confirm_password"),
                "invalid_message" => "errors.messages.not_match",
            ))
            ->add("name", TextType::class, array("label" => "fields.name"))
            ->add("phone", NumberType::class, array("label" => "fields.phone"))
            ->add("gender", ChoiceType::class, array(
                "choices" => array("m" => "gender.male", "f" => "gender.female"),
                "label" => "fields.gender"))
            ->add("seat_phone", NumberType::class, array("label" => "fields.seat_phone"))
            ->add("birthday", BirthdayType::class, array(
                "label" => "fields.birthday",
                "widget" => "single_text",
            ))
            ->add("IDnumber", TextType::class, array("label" => "fields.ID"))
            ->add("isActive", ChoiceType::class, array(
                "label" => "fields.isActive",
                "choices" => array("1" => "yOrN.yes", "0" => "yOrN.no"),
            ))
            ->add("save", SubmitType::class, array("label" => "fields.save"));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Employee',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_employee';
    }

}
