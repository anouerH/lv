<?php

namespace Lv\SaladeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Lv\SaladeBundle\Entity\CommandeRepository")
 */
class Commande
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
     * @var string
     *
     * @ORM\Column(name="serveur", type="string", length=255, nullable=true)
     */
    private $serveur;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_table", type="integer", nullable=true)
     */
    private $numTable;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;

    /**
     * @var integer
     *
     * @ORM\Column(name="vue", type="integer")
     */
    private $vue;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    private $message;

    /**
     * @var integer
     *
     * @ORM\Column(name="vuecaisse", type="integer")
     */
    private $vuecaisse;

    /**
     * @var integer
     *
     * @ORM\Column(name="livraison", type="integer", nullable=true)
     */
    private $livraison;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255, nullable=true)
     */
    private $source;

    /**
     * @ORM\Column(name="total", type="decimal", scale=2)
     */
    protected $total;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
    * @ORM\ManyToOne(targetEntity="Lv\UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=false)
    */
    private $user;
    
    public function __construct()
    {
        $this->createdAt = new \Datetime();
        $this->etat = 0;
        $this->vue = 0;
        $this->vuecaisse = 0;
        
    }
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
     * Set serveur
     *
     * @param string $serveur
     * @return Commande
     */
    public function setServeur($serveur)
    {
        $this->serveur = $serveur;

        return $this;
    }

    /**
     * Get serveur
     *
     * @return string 
     */
    public function getServeur()
    {
        return $this->serveur;
    }

    /**
     * Set numTable
     *
     * @param integer $numTable
     * @return Commande
     */
    public function setNumTable($numTable)
    {
        $this->numTable = $numTable;

        return $this;
    }

    /**
     * Get numTable
     *
     * @return integer 
     */
    public function getNumTable()
    {
        return $this->numTable;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     * @return Commande
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set vue
     *
     * @param integer $vue
     * @return Commande
     */
    public function setVue($vue)
    {
        $this->vue = $vue;

        return $this;
    }

    /**
     * Get vue
     *
     * @return integer 
     */
    public function getVue()
    {
        return $this->vue;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Commande
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set vuecaisse
     *
     * @param integer $vuecaisse
     * @return Commande
     */
    public function setVuecaisse($vuecaisse)
    {
        $this->vuecaisse = $vuecaisse;

        return $this;
    }

    /**
     * Get vuecaisse
     *
     * @return integer 
     */
    public function getVuecaisse()
    {
        return $this->vuecaisse;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Commande
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set user
     *
     * @param \Lv\UserBundle\Entity\User $user
     * @return Commande
     */
    public function setUser(\Lv\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Lv\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set livraison
     *
     * @param integer $livraison
     * @return Commande
     */
    public function setLivraison($livraison)
    {
        $this->livraison = $livraison;

        return $this;
    }

    /**
     * Get livraison
     *
     * @return integer 
     */
    public function getLivraison()
    {
        return $this->livraison;
    }

    /**
     * Set source
     *
     * @param string $source
     * @return Commande
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set total
     *
     * @param string $total
     * @return Commande
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string 
     */
    public function getTotal()
    {
        return $this->total;
    }
}
