<?php

namespace EspritApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="EspritApiBundle\Repository\produitRepository")
 */
class produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

     /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=255, nullable=false)
     */
    private $couleur;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var float
     *
     * @ORM\Column(name="prixt", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixt;

    /**
     * @var integer
     *
     * @ORM\Column(name="remise", type="integer", nullable=false)
     */
    private $remise;

    /**
     * @var float
     *
     * @ORM\Column(name="prixr", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixr;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * @param string $couleur
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    /**
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param int $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return float
     */
    public function getPrixt()
    {
        return $this->prixt;
    }

    /**
     * @param float $prixt
     */
    public function setPrixt($prixt)
    {
        $this->prixt = $prixt;
    }

    /**
     * @return int
     */
    public function getRemise()
    {
        return $this->remise;
    }

    /**
     * @param int $remise
     */
    public function setRemise($remise)
    {
        $this->remise = $remise;
    }

    /**
     * @return float
     */
    public function getPrixr()
    {
        return $this->prixr;
    }

    /**
     * @param float $prixr
     */
    public function setPrixr($prixr)
    {
        $this->prixr = $prixr;
    }
    
   
 /**
  * One Company has One Product.
  *@ORM\OneToOne(targetEntity = "entreprise")
  *@ORM\JoinColumn(name = "marque", referencedColumnName = "id")
  */
  private $entreprise;
  /**
     * @return string
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * 
     * @param string $entreprise
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
    }
}

