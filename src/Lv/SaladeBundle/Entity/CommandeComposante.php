<?php

namespace Lv\SaladeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeComposante
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CommandeComposante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="commande", type="integer")
     */
    private $commande;

    /**
     * @var integer
     *
     * @ORM\Column(name="composante", type="integer")
     */
    private $composante;

    /**
     * @var integer
     *
     * @ORM\Column(name="qunatite", type="integer")
     */
    private $qunatite;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set commande
     *
     * @param integer $commande
     * @return CommandeComposante
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return integer 
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set composante
     *
     * @param integer $composante
     * @return CommandeComposante
     */
    public function setComposante($composante)
    {
        $this->composante = $composante;

        return $this;
    }

    /**
     * Get composante
     *
     * @return integer 
     */
    public function getComposante()
    {
        return $this->composante;
    }

    /**
     * Set qunatite
     *
     * @param integer $qunatite
     * @return CommandeComposante
     */
    public function setQunatite($qunatite)
    {
        $this->qunatite = $qunatite;

        return $this;
    }

    /**
     * Get qunatite
     *
     * @return integer 
     */
    public function getQunatite()
    {
        return $this->qunatite;
    }
}
