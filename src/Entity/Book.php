<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="idB")
     */
    private $idB;

    /**
     * @ORM\Column(type="integer", precision=4, name="numberOfPoints")
     */
    private $numberOfPoints;


    //Getters & Setters
    public function getIdB(): ?int
    {
        return $this->idB;
    }

    public function getNumberOfPoints(){
        return $this->numberOfPoints;
    }
    public function setNumberOfPoints($numberOfPoints){
        $this->numberOfPoints = $numberOfPoints;
    }
}
