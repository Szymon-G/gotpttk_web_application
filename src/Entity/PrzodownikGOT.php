<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrzodownikGOTRepository")
 */
class PrzodownikGOT
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idP;

    /**
     * @ORM\Column(type="text", length=30)
     */
    private $imie;

    /**
     * @ORM\Column(type="text", length=30)
     */
    private $nazwisko;

    /**
     * @ORM\Column(type="text", length=16)
     */
    private $login;

    /**
     * @ORM\Column(type="text", length=16)
     */
    private $haslo;

    /**
     * @ORM\Column(type="integer")
     */
    private $idA;



    //Getters & Setters
    public function getIdP(): ?int
    {
        return $this->idP;
    }
    
    public function getImie(){
        return $this->imie;
    }
    public function setImie($imie){
        $this->imie = $imie;
    }

    public function getNazwisko(){
        return $this->nazwisko;
    }
    public function setNazwisko($nazwisko){
        $this->nazwisko = $nazwisko;
    }

    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }

    public function getHaslo(){
        return $this->haslo;
    }
    public function setHaslo($haslo){
        $this->haslo = $haslo;
    }

    public function getIdA(){
        return $this->idA;
    }
    public function setIdA($idA){
        $this->idK = $idA;
    }


    
}
