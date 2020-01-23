<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrzodownikGrupyRepository")
 */
class PrzodownikGrupy
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $idP;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $idG;

    /**
     * @ORM\Column(type="date", nullable=TRUE)
     */
    private $dataPG;


    public function __construct($idP, $idG){
        $this->idP = $idP;
        $this->idG = $idG;
    }


    
    //Getters & Setters
    public function getIdP(): ?int
    {
        return $this->idP;
    }
    public function getIdG(): ?int
    {
        return $this->idG;
    }

    public function getDataPG(){
        return $this->dataPG;
    }
    public function setDataPG($dataPG){
        $this->dataPG = $dataPG;
    }
}
