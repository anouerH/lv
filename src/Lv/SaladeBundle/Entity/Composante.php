<?php

namespace Lv\SaladeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composante
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Lv\SaladeBundle\Entity\ComposanteRepository")
 */
class Composante
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_unitaire", type="decimal")
     */
    private $prixUnitaire;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal")
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="image", type="integer")
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_public", type="string", length=255)
     */
    private $nomPublic;

    /**
     * @var integer
     *
     * @ORM\Column(name="calories", type="integer")
     */
    private $calories;

    /**
     * @var integer
     *
     * @ORM\Column(name="grammage", type="integer")
     */
    private $grammage;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre", type="integer")
     */
    private $ordre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
    * @ORM\ManyToOne(targetEntity="Lv\SaladeBundle\Entity\Famille")
    * @ORM\JoinColumn(nullable=false)
    */
    private $famille;



    public function __construct()
    {
        $this->createdAt = new \Datetime();
        $this->image  = intval(sprintf('%09d', mt_rand(0, 1999999999)));
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
     * Set nom
     *
     * @param string $nom
     * @return Composante
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prixUnitaire
     *
     * @param string $prixUnitaire
     * @return Composante
     */
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    /**
     * Get prixUnitaire
     *
     * @return string 
     */
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * Set prix
     *
     * @param string $prix
     * @return Composante
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set image
     *
     * @param integer $image
     * @return Composante
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return integer 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set nomPublic
     *
     * @param string $nomPublic
     * @return Composante
     */
    public function setNomPublic($nomPublic)
    {
        $this->nomPublic = $nomPublic;

        return $this;
    }

    /**
     * Get nomPublic
     *
     * @return string 
     */
    public function getNomPublic()
    {
        return $this->nomPublic;
    }

    /**
     * Set calories
     *
     * @param integer $calories
     * @return Composante
     */
    public function setCalories($calories)
    {
        $this->calories = $calories;

        return $this;
    }

    /**
     * Get calories
     *
     * @return integer 
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * Set grammage
     *
     * @param integer $grammage
     * @return Composante
     */
    public function setGrammage($grammage)
    {
        $this->grammage = $grammage;

        return $this;
    }

    /**
     * Get grammage
     *
     * @return integer 
     */
    public function getGrammage()
    {
        return $this->grammage;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     * @return Composante
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
     * Set ordre
     *
     * @param integer $ordre
     * @return Composante
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer 
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Composante
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Composante
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set famille
     *
     * @param \Lv\SaladeBundle\Entity\Famille $famille
     * @return Composante
     */
    public function setFamille(\Lv\SaladeBundle\Entity\Famille $famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return \Lv\SaladeBundle\Entity\Famille 
     */
    public function getFamille()
    {
        return $this->famille;
    }
}
