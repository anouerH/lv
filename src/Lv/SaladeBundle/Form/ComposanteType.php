<?php

namespace Lv\SaladeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComposanteType extends AbstractType
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
            ->add('prixUnitaire')
            ->add('prix')
            //->add('image')
            ->add('nomPublic')
            ->add('calories')
            ->add('grammage')
            //->add('etat')
            ->add('etat', 'choice', array(
                'choices' => array('1' => '1', '2' => '2', '3' => '3'),
                'multiple' => false,
                'expanded' => true,
                'required' => true,
                //'data' => 'OFFRE',
            ))

            ->add('ordre')
            // ->add('createdAt')
            // ->add('updatedAt')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lv\SaladeBundle\Entity\Composante'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lv_saladebundle_composante';
    }
}
