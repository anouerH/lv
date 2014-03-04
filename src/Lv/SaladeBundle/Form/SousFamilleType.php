<?php

namespace Lv\SaladeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SousFamilleType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('famille', 'entity', array('class' => 'LvSaladeBundle:Famille','empty_value' => 'Sélectionner une valeur'))
            ->add('description')
            //->add('createdAt')
            //->add('updatedAt')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lv\SaladeBundle\Entity\SousFamille'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lv_saladebundle_sousfamille';
    }
}
