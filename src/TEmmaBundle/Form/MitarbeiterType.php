<?php

namespace TEmmaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

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
                ->add('mitarbeiteradresse');
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
