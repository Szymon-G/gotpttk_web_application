<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KsiazeczkaWeryfikowanaRepository")
 */
class KsiazeczkaWeryfikowana
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $idK;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $idP;

    /**
     * @ORM\Column(type="date", nullable=TRUE)
     */
    private $dataWeryfikacji;


    public function __construct($idK, $idP){
        $this->idK = $idK;
        $this->idP = $idP;
    }


    
    //Getters & Setters
    public function getIdK(): ?int
    {
        return $this->idK;
    }
    public function getIdP(): ?int
    {
        return $this->idP;
    }

    public function getDataWeryfikacji(){
        return $this->dataWeryfikacji;
    }
    public function setDataWeryfikacji($dataWeryfikacji){
        $this->dataWeryfikacji = $dataWeryfikacji;
    }
}
