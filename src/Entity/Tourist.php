<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TouristRepository")
 */
class Tourist
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="idTu")
     */
    private $idTu;
    
    /**
     * @ORM\Column(type="text", length=30, name="firstName")
     */
    private $firstName;

    /**
     * @ORM\Column(type="text", length=30, name="lastName")
     */
    private $lastName;

    /**
     * @ORM\Column(type="text", length=16)
     */
    private $login;

    /**
     * @ORM\Column(type="text", length=16)
     */
    private $password;

    /**
     * @ORM\Column(type="integer", nullable=TRUE, unique=TRUE, name="idB")
     */
    private $idB;


    //Getters & Setters
    public function getIdTu(): ?int
    {
        return $this->idTu;
    }
    
    public function getFirstName(){
        return $this->firstName;
    }
    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }
    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }

    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }

    public function getIdB(){
        return $this->idB;
    }
    public function setIdB($idB){
        $this->idB = $idB;
    }
}
