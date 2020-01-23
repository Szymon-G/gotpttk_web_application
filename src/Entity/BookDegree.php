<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookDegreeRepository")
 */
class BookDegree
{
     /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Book")
     * @ORM\JoinColumn(name="idB", referencedColumnName="idB", nullable=FALSE)
     */
    private $idB;

     /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Degree")
     * @ORM\JoinColumn(name="idD", referencedColumnName="idD", nullable=FALSE)
     */
    private $idD;

    /**
     * @ORM\Column(type="date", nullable=TRUE, name="earnDate")
     */
    private $earnDate;

    
    public function __construct($idB, $idD){
        $this->idB = $idB;
        $this->idD = $idD;
    }


    
    //Getters & Setters
    public function getIdB(): ?int
    {
        return $this->idB;
    }
   
    public function getIdD()
    {
        return $this->idD;
    }

    public function getEarnDate(){
        return $this->earnDate;
    }
    public function setEarnDate($earnDate){
        $this->earnDate = $earnDate;
    }
}
