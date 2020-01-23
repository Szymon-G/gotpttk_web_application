<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DegreeRepository")
 */
class Degree
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="idD")
     */
    private $idD;

    /**
     * @ORM\Column(type="text", length=60)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", precision=3, name="requiredPointsAmount")
     */
    private $requiredPointsAmount;



    //Getters & Setters
    public function getIdD(): ?int
    {
        return $this->idD;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getRequiredPointsAmount(){
        return $this->requiredPointsAmount;
    }
    public function setRequiredPointsAmount($requiredPointsAmount){
        $this->requiredPointsAmount = $requiredPointsAmount;
    }

}
