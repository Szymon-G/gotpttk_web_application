<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PointRepository")
 */
class Point
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="idP")
     */
    private $idP;

    /**
     * @ORM\Column(type="text", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="float", precision=10, nullable=TRUE)
     */
    private $latitude;

     /**
     * @ORM\Column(type="float", precision=10, nullable=TRUE)
     */
    private $longitude;

    //Getters & Setters
    public function getIdP(){
        return $this->idP;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getLatitude(){
        return $this->latitude;
    }
    public function setlatitude($latitude){
        $this->latitude = $latitude;
    }

    public function getLongitude(){
        return $this->longitude;
    }
    public function setLongitude($longitude){
        $this->longitude = $longitude;
    }
}
