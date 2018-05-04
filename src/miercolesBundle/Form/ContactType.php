<?php
// your-path-to-types/ContactType.php

namespace miercolesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('attr' => array('placeholder' => 'Nombre'),
                'constraints' => array(
                    new NotBlank(array("message" => "Escriba su nombre")),
                )
            ))
            ->add('subject', TextType::class, array('attr' => array('placeholder' => 'Titulo'),
                'constraints' => array(
                    new NotBlank(array("message" => "Escriba el titulo del mensaje")),
                )
            ))
            ->add('email', EmailType::class, array('attr' => array('placeholder' => 'Email'),
                'constraints' => array(
                    new NotBlank(array("message" => "Escriba un email valido")),
                    new Email(array("message" => "Este email no es valido")),
                )
            ))
            ->add('message', TextareaType::class, array('attr' => array('placeholder' => 'Mensaje'),
                'constraints' => array(
                    new NotBlank(array("message" => "Escriba su mensaje")),
                )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'error_bubbling' => true
        ));
    }

    public function getName()
    {
        return 'contact_form';
    }
}
