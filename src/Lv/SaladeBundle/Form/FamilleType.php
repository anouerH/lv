<?php

namespace Lv\SaladeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
class FamilleType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            //->add('famille', 'entity', array('class' => 'LvSaladeBundle:Famille','required'    => false,'empty_value' => 'Sélectionner une valeur'))

            ->add('famille', 'entity', array(
                    'class' => 'LvSaladeBundle:Famille',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('f')
                            ->where('f.famille is null')
                            ->orderBy('f.nom', 'ASC');
                    },
                    'required'    => false,'empty_value' => 'Sélectionner une valeur'
                ))



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
            'data_class' => 'Lv\SaladeBundle\Entity\Famille'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lv_saladebundle_famille';
    }
}
