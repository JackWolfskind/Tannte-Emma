<?php

namespace TEmmaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class GeschaefteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('datum')
                ->add('geschaeftsart')
                ->add('kundenr')
                ->add('angelegtvon')
                ->add('posten', CollectionType::class,array(
                    'entry_type' => PostenType::class,
                    'allow_add'  => true,
                    'by_reference' => false,
                ));
          //$builder->add('posten', CollectionType::class, array('type' => new PostenType()));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TEmmaBundle\Entity\Geschaefte'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'temmabundle_geschaefte';
    }


}
