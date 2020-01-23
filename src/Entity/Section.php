<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SectionRepository")
 */
class Section
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="idS")
     */
    private $idS;

    /**
     * @ORM\Column(type="integer", precision=2, nullable=TRUE, name="pointsGOT")
     */
    private $pointsGOT;

    /**
     * @ORM\Column(type="float", precision=10, nullable=TRUE, name="sectionLength")
     */
    private $sectionLength;

    /**
     * @ORM\Column(type="float", precision=10, nullable=TRUE, name="elevationGain")
     */
    private $elevationGain;

    /**
     * @ORM\ManyToOne(targetEntity="Point")
     * @ORM\JoinColumn(name="startPoint", referencedColumnName="idP", nullable=FALSE)
     */
    private $startPoint;

    /**
     * @ORM\ManyToOne(targetEntity="Point")
     * @ORM\JoinColumn(name="endPoint", referencedColumnName="idP", nullable=FALSE)
     */
    private $endPoint;

    /**
     * @ORM\Column(type="boolean", nullable=TRUE, name="isOutOfBase")
     */
    private $isOutOfBase;

    /**
     * @ORM\ManyToOne(targetEntity="MountainGroup")
     * @ORM\JoinColumn(name="idG", referencedColumnName="idG",nullable=FALSE)
     */
    private $idG;

    public function __construct($idS, $pointsGOT, $sectionLength, $elevationGain, $startPoint, $endPoint, $isOutOfBase, $idG)
    {
        $this->idS = $idS;
        $this->pointsGOT = $pointsGOT;
        $this->sectionLength = $sectionLength;
        $this->elevationGain = $elevationGain;
        $this->startPoint = $startPoint;
        $this->endPoint = $endPoint;
        $this->isOutOfBase = $isOutOfBase;
        $this->idG = $idG;
    }

    //Getters & Setters
    public function getIdS(){
        return $this->idS;
    }

    public function getPointsGOT(){
        return $this->pointsGOT;
    }
    
    public function setPointsGOT($pointsGOT){
        $this->pointsGOT = $pointsGOT;
    }

    public function getSectionLength(){
        return $this->sectionLength;
    }
    public function setSectionLength($sectionLength){
        $this->sectionLength = $sectionLength;
    }

    public function getElevationGain(){
        return $this->elevationGain;
    }
    public function setElevationGain($elevationGain){
        $this->elevationGain = $elevationGain;
    }

    public function getStartPoint(){
        return $this->startPoint;
    }

    public function getStartPointName()
    {
        return $this->startPoint->getName();
    }

    public function setStartPoint($startPoint){
        $this->startPoint = $startPoint;
    }

    public function getEndPoint(){
        return $this->endPoint;
    }

    public function getEndPointName(){
        return $this->endPoint->getName();
    }

    public function setEndPoint($endPoint){
        $this->endPoint = $endPoint;
    }

    public function getMountainGroupName()
    {
        return $this->idG->getName();
    }

    public function getMountainGroupCode()
    {
        return $this->idG->getGroupCode();
    }

    public function getIsOutOfBase()
    {
        return $this->isOutOfBase;
    }

    public function setIsOutOfBase($isOutOfBase)
    {
        return $this->$isOutOfBase= $isOutOfBase;
    }

    public function getIdG(){
        return $this->idG;
    }
    public function setIdG($idG){
        $this->idG = $idG;
    }
}
