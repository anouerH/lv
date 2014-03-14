<?php

namespace Lv\SaladeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommandeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serveur')
            ->add('numTable')
            ->add('etat')
            ->add('vue')
            ->add('message')
            ->add('vuecaisse')
            ->add('createdAt')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lv\SaladeBundle\Entity\Commande'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lv_saladebundle_commande';
    }
}
