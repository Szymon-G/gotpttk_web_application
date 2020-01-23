<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SectionTrailRepository")
 */
class SectionTrail
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Trail", inversedBy="idT")
     * @ORM\JoinColumn(name="idT", referencedColumnName="idT", nullable=FALSE)
     */
    private $idT;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Section", inversedBy="idS")
     * @ORM\JoinColumn(name="idS", referencedColumnName="idS", nullable=FALSE)
     */
    private $idS;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $sectionNo;


    public function __construct($idT, $idS)
    {
        $this->idT = $idT;
        $this->idS = $idS;
    }

    //Getters & Setters
    public function getIdT()
    {
        return $this->idT;
    }
    public function getIdS()
    {
        return $this->idS;
    }

    public function getSectionNo()
    {
        return $this->sectionNo;
    }
    public function setSectionNo($sectionNo)
    {
        $this->sectionNo = $sectionNo;
    }
}
