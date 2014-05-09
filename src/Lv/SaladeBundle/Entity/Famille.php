<?php

namespace Lv\SaladeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Famille
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Lv\SaladeBundle\Entity\FamilleRepository")
 */
class Famille
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

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
    * @ORM\JoinColumn(nullable=true)
    */
    private $famille;
    

    /**
     * @ORM\OneToMany(targetEntity="Composante", mappedBy="famille")
     */
    protected $composantes;

    private $active_composantes;

    private $imageFullPath;
    
    private $sousFamilleData;


    public function __construct()
    {
        $this->createdAt = new \Datetime();
        $this->image  = intval(sprintf('%09d', mt_rand(0, 1999999999)));
        $imageFullPath = '';
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
     * @return Famille
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
     * Set description
     *
     * @param string $description
     * @return Famille
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Famille
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
     * @return Famille
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

    public function __toString()
    {
        return $this->getNom();
    }



    /**
     * Set famille
     *
     * @param \Lv\SaladeBundle\Entity\Famille $famille
     * @return Famille
     */
    public function setFamille(\Lv\SaladeBundle\Entity\Famille $famille = null)
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

    /**
     * Add composantes
     *
     * @param \Lv\SaladeBundle\Entity\Composante $composantes
     * @return Famille
     */
    public function addComposante(\Lv\SaladeBundle\Entity\Composante $composantes)
    {
        $this->composantes[] = $composantes;

        return $this;
    }

    /**
     * Remove composantes
     *
     * @param \Lv\SaladeBundle\Entity\Composante $composantes
     */
    public function removeComposante(\Lv\SaladeBundle\Entity\Composante $composantes)
    {
        $this->composantes->removeElement($composantes);
    }

    /**
     * Get composantes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComposantes()
    {
        return $this->composantes;
    }

    public function setActiveComposantes($composantes)
    {
        $this->active_composantes = $composantes;
    }

    public function getActiveComposantes()
    {
        return $this->active_composantes;
    }
    
    public function setSousFamilleData($sousFamilleData)
    {
        $this->sousFamilleData = $sousFamilleData;
    }

    public function getSousFamilleData()
    {
        return $this->sousFamilleData;
    }
    
	
	
}
