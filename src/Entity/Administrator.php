<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdministratorRepository")
 */
class Administrator
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="idA")
     */
    private $idA;

    /**
     * @ORM\Column(type="text", name="firstName", length=30)
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



    //Getters & Setters
    public function getIdA(): ?int
    {
        return $this->idA;
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
}
