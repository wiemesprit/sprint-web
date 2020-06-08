<?php

namespace EspritApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity(repositoryClass="EspritApiBundle\Repository\entrepriseRepository")
 */
class entreprise
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
     * Get id
     *
     * @return int
     */
    
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255, nullable=false)
     */
    private $marque;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getMarque()
    {
        return $this->marque;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

}

