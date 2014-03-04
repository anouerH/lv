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
            // ->add('famille', 'entity', array('class' => 'LvSaladeBundle:Famille','empty_value' => 'Sélectionner une valeur'))
            // ->add('sousfamille', 'entity', array('class' => 'LvSaladeBundle:SousFamille','empty_value' => 'Sélectionner une valeur'))


           
            ->add('famille', 'entity', array('class'      => 'LvSaladeBundle:Famille'
                                           , 'required'   => true
                                           , 'empty_value'=> '== Choose Famille =='))
            ->add('sousfamille', 'shtumi_dependent_filtered_entity'
                        , array('entity_alias' => 'sousfamille_by_famille'
                              , 'empty_value'=> '== Choose sous Famille =='
                              , 'parent_field'=>'famille'))



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
