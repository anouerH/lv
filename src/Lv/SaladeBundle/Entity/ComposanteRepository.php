<?php

namespace Lv\SaladeBundle\Entity;

use Doctrine\ORM\EntityRepository;
/**
 * ComposanteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ComposanteRepository extends EntityRepository
{
	/**
	* get composnates
	*/
	public function getActiveComposantes($famille_id = null)
    {
        $qb = $this->createQueryBuilder('c')
            //->where('j.expires_at > :date')
            //->setParameter('date', date('Y-m-d H:i:s', time()))
            ->orderBy('c.createdAt', 'DESC');

        if($famille_id)
        {
            $qb->andWhere('c.famille = :famille_id')
               ->setParameter('famille_id', $famille_id);
        }

        $query = $qb->getQuery();

        return $query->getResult();
    }

    public function getOverview($keys = array()){

       $qb = $this->createQueryBuilder('c');
       $qb->select('c')
          ->where('c.id IN (?1)')
          ->orderBy('c.ordre', 'ASC')
          ->setParameter(1, $keys)
       ;
       
       $query = $qb->getQuery();
       return $query->getResult();

    }


}
