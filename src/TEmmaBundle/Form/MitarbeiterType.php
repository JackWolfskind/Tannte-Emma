<?php

namespace TEmmaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use Symfony\Component\OptionsResolver\OptionsResolver;

class MitarbeiterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('mitarbeitername')
                ->add('mitarbeitervorname')
                ->add('mitarbeitertelefon')
                ->add('mitarbeiteradresse')
                ->add('passwd', PasswordType::CLASS);
                //>add('mitarbeiterid');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TEmmaBundle\Entity\Mitarbeiter'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'temmabundle_mitarbeiter';
    }


}
