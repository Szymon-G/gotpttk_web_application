<?php

namespace App\Controller;

use App\Entity\MountainGroup;
use App\Entity\Section;
use App\Entity\Book;
use App\Entity\SectionTrail;
use App\Entity\Trail;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\VarDumper\Cloner\Data;

class TrailController extends AbstractController
{
  /**
   * Main method rendering the content of /createTrail
   * 
   * @Route("/createTrail", methods={"POST"}, name="trailsView")
   * @param SessionInterface $session
   * @return void
   */
  public function trailsView(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $request = Request::createFromGlobals();
    $deleteSectionKey = $request->request->get('deleteSectionKey');
    $idS = $request->request->get('idS'); 
    $modyfying = $session->get('modyfying');
    if(isset($modyfying)){
      return $this->redirectToRoute('modify', ['request' => $request], 307);
    }
    if(!isset($idS)) {
      $idS = $session->get('ownSectionId');
      $session->set('ownSectionId', null);
    }
    $sections = null;
    $sumOfPoints = 0;
    $date = $session->get('date');
    if (isset($idS)) {
      if($idS == 0) [$sections, $sumOfPoints] = $this->getTralSections($session);
      else [$sections, $sumOfPoints] = $this->addNewSectionForTrail($idS, $session);
    } else if (isset($deleteSectionKey)) {
      [$sections, $sumOfPoints] = $this->deleteSection($deleteSectionKey, $session);
    } else {
      $session->set('currentSectionsArray', array());
    }

    if (empty($sections)) return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date));
    else return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints));
  }

  /**
   * Method rendering the welcome screen with data input and content of /createTrail
   * 
   * @Route("/createTrail", name="createTrail")
   * @param SessionInterface $session
   * @return void
   */
  public function createTrail(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $session->remove('modyfying');
    return $this->render('createTrail.html.twig', array('logged' => $logged));
  }

  /**
   * Method rendering the content after save action click for /createTrail
   * 
   * @Route("/createTrail_save", methods={"POST"})
   * @param SessionInterface $session
   * @return void
   */
  public function createTrailSave(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $idB = $session->get('idB');
    $date = $session->get('date');
    [$sections, $sumOfPoints] = $this->getTralSections($session);

    if ($logged) {
      if ($this->isTrailValid($session)) {
        $entityManager = $this->getDoctrine()->getManager();
        $trail = $this->createNewTrail($idB, $date, $sumOfPoints);
        $currentSectionsArray = $session->get('currentSectionsArray');
        $sectionNumber = 0;
        foreach ($currentSectionsArray as $currentSection) {
          $section = $entityManager->getRepository(Section::class)->find($currentSection->getIdS());
          $this->createNewSectionTrail($trail, $section, $sectionNumber);
          $sectionNumber++;
        }
      } else {
        if (empty($sections)) return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints, 'noSections' => true));
        else return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints, 'failure' => true));
      }
    } else {
      return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints, 'logToSave' => true));
    }
    return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints, 'success' => true));
  }

  /** 
   * Method creates new trail
   *
   * @param Int $idB
   * @param String $date
   * @param Int $sumOfPoints
   * @return Trail
   */
  public function createNewTrail(Int $idB, String $date, Int $sumOfPoints): Trail
  {
    $entityManager = $this->getDoctrine()->getManager();
    $book = $entityManager->getRepository(Book::class)->find($idB);
    $trail = new Trail(0, $sumOfPoints, false, false, date_create($date), $book);
    $entityManager->persist($trail);
    $entityManager->flush();
    return $entityManager->getRepository(Trail::class)->find($trail->getIdT());
  }

  /**
   * Method creates new section trail
   * 
   * @param Trail $trail
   * @param Section $section
   * @param Int $sectionNumber
   * @return void
   */
  private function createNewSectionTrail(Trail $trail, Section $section, Int $sectionNumber)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $sectionTrail = new SectionTrail($trail, $section);
    $sectionTrail->setSectionNo($sectionNumber);
    $entityManager->persist($sectionTrail);
    $entityManager->flush();
  }

  /**
   * Method removes section trail
   * 
   * @param Int $idT
   * @return void
   */
  private function deleteSectionTrail(Int $idT, SessionInterface $session)
  {
    $sectionsTrail = $this->getDoctrine()->getRepository(SectionTrail::class)->findByIdT($idT);
    $entityManager = $this->getDoctrine()->getManager();
    $sections = $session->get('currentSectionsArray');
    foreach ($sectionsTrail as $sectionTrail) {
      $flag = true;
      foreach ($sections as $section) {
        if ($section->getIdS() == $sectionTrail->getIdS()->getIdS()) {
          $flag = false;
        }
      }
      if ($flag) {
        $section = $sectionTrail->getIdS();
        if ($section->getIsOutOfBase()) {
          $entityManager->remove($section->getStartPoint());
          $entityManager->remove($section->getEndPoint());
          $entityManager->remove($section);
        }
      }
      $entityManager->remove($sectionTrail);
    }
    $entityManager->flush();
  }

  /**
   * Method checkes if date input is valid
   * 
   * @Route("/createTrail_check", methods={"POST"})
   * @param SessionInterface $session
   * @return void
   */
  public function checkDate(SessionInterface $session)
  {
    $request = Request::createFromGlobals();
    $date = $request->request->get('date');
    if($date){
      $session->set('date', $date);
      return $this->forward('App\Controller\TrailController::trailsView');
    }else{
      $this->addFlash('date','visible');
      return $this->redirectToRoute('createTrail');
    }
  }

  /**
   * Method adds new section for current trail
   * 
   * @param Int $idS
   * @param SessionInterface $session
   * @return void
  */
  private function addNewSectionForTrail(Int $idS, SessionInterface $session)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $currentSectionsArray = $session->get('currentSectionsArray');
    $section = $entityManager->getRepository(Section::class)->find($idS);
    array_push($currentSectionsArray, $section);
    $session->set('currentSectionsArray', $currentSectionsArray);
    return $this->getTralSections($session);
  }

  /**
   * Method deletes section
   * 
   * @param Int $deleteSectionKey
   * @param SessionInterface $session
   * @return void
   */
  private function deleteSection(Int $deleteSectionKey, SessionInterface $session)
  {
    $currentSectionsArray = $session->get('currentSectionsArray');
    unset($currentSectionsArray[$deleteSectionKey]);
    $currentSectionsArray = array_values($currentSectionsArray);
    $session->set('currentSectionsArray', $currentSectionsArray);
    return $this->getTralSections($session);
  }

  /**
   * Method generates list of sections with their sum of GOT points
   *
   * @param SessionInterface $session
   * @return array
   */
  public function getTralSections(SessionInterface $session) :array
  {
    $currentSectionsArray = $session->get('currentSectionsArray');
    $sumOfPoints = 0;
    foreach ($currentSectionsArray as $currentSection) {
      $sumOfPoints += $currentSection->getPointsGOT();
    }
    return (array($currentSectionsArray, $sumOfPoints));
  }

  /**
   * Method checkes if trail is valid wheater there is no 2 the same sections
   *
   * @param SessionInterface $session
   * @return boolean
   */
  public function isTrailValid(SessionInterface $session):bool
  {
    $currentSectionsArray = $session->get('currentSectionsArray');
    $isValid = true;
    if(!empty($currentSectionsArray)){
      $sectionsIds = array();
      $sectionsGroupsKey = array();
      foreach ($currentSectionsArray as $currentSection) {
        array_push($sectionsIds, $currentSection->getIdS());
        array_push($sectionsGroupsKey, substr($currentSection->getIdG()->getGroupCode(), 0, 1));
      }
      foreach (array_count_values($sectionsIds) as $id) {
        if ($id > 1) $isValid = false;
      }
      $firstSectionsGroupsKey = $sectionsGroupsKey[0];
      foreach (($sectionsGroupsKey) as $key) {
        if ($key != $firstSectionsGroupsKey) $isValid = false;
      }
    } 
    else{
      $isValid = false;
    }
    return $isValid;
  }

  /**
   * @Route("/trailsList")
   * @param SessionInterface $session
   * @return void
   */
  public function list(SessionInterface $session)
  {
    $session->remove('currentSectionsArray');
    $session->remove('modyfying');
    $logged = $session->get('logged');
    $logged = $session->get('logged');
    if(!isset($logged)){
      return $this->redirectToRoute('login');
    }
    $idB = $session->get('idB');

    $doctrine = $this->getDoctrine();
    $trails = $doctrine->getRepository(Trail::class)->findBy(array('idBook'=>$idB),array('trailDate'=>'DESC'));

    $allTrails = array();

    foreach($trails as $trail){
      $allSectionsTrail = array();
      $sectionsTrail = $doctrine->getRepository(SectionTrail::class)->findByIdT($trail->getIdT(), array('sectionNo'=>'ASC'));
      
      foreach($sectionsTrail as $sectionTrail){
        array_push($allSectionsTrail, $sectionTrail->getIdS());
      }
      array_push($allTrails, $allSectionsTrail);
    }

    return $this->render('trailsList.html.twig', [
      'logged' => $logged,
      'trails' => $trails,
      'allTrails' => $allTrails
    ]);
  }

  /**
   * @Route("/modifyTrail", methods={"POST"}, name="modify")
   * @param SessionInterface $session
   * @return void
   */
  public function modifyTrail(SessionInterface $session)
  {
    $session->set('modyfying', true);
    $request = Request::createFromGlobals();
    $trailId = $request->request->get('modifyTrailId');
    $deleteSectionKey = $request->request->get('deleteSectionKey');
    $idS = $request->request->get('idS');
    $modifiedIdS = $request->query->get('modifiedIdS');
    $sections = $session->get('currentSectionsArray');
    $date = $session->get('date');
    $sumOfPoints = $session->get('sumOfPoints');
    //$idB = $session->get('idB');
    $doctrine = $this->getDoctrine();
    if(isset($modifiedIdS)){
        [$sections, $sumOfPoints] = $this->sectionModified($modifiedIdS, $session);
      } else {
      if(!isset($idS)) {
        $idS = $session->get('ownSectionId');
        $session->set('ownSectionId', null);
      }
      if(isset($idS)){
	      if($idS==0) [$sections,$sumOfPoint] = $this->getTralSections($session);
	      else [$sections, $sumOfPoints] = $this->addNewSectionForTrail($idS, $session);
      }
      else if (isset($deleteSectionKey)) {
        [$sections, $sumOfPoints] = $this->deleteSection($deleteSectionKey, $session);
      } 
      else if (!isset($sections)){
        $trail = $doctrine->getRepository(Trail::class)->findOneByIdT($trailId);
        $sectionsTrail = $doctrine->getRepository(SectionTrail::class)->findByIdT($trailId, array('sectionNo'=>'ASC'));
        $sections = array();
        foreach($sectionsTrail as $sectionTrail){
          array_push($sections, $sectionTrail->getIdS());
        }
        $session->set('currentSectionsArray', $sections);
        $date = $trail->getTrailDateString();
        $sumOfPoints = $trail->getSumOfPointsGOT();

        $session->set('sumOfPoints', $sumOfPoints);
        $session->set('date', $date);  
        $session->set('trail', $trailId);
      }
   }
    if(empty($sections)) 
      return $this->render('modifyTrail.html.twig', 
                            array('logged' => true, 'date' => $date, 
                            'sumOfPoints' => $sumOfPoints));
    else
      return $this->render('modifyTrail.html.twig', 
                            array('logged' => true, 'date' => $date, 'sections' => $sections, 
                            'sumOfPoints' => $sumOfPoints));
  }

  /**
   * @Route("/modifyTrail_save", methods={"POST"})
   * @param SessionInterface $session
   * @return void
   */
  public function modifyTrailSave(SessionInterface $session)
  {
    [$sections, $sumOfPoints] = $this->getTralSections($session);
    $logged = $session->get('logged');
    $date = $session->get('date');

    if (empty($sections)) return $this->render('modifyTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints, 'noSections' => true));
    if ($this->isTrailValid($session)) {

      $entityManager = $this->getDoctrine()->getManager();
      $idT = $session->get('trail');
      $trail = $entityManager->getRepository(Trail::class)->findOneByIdT($idT);
      $trail->setHasSectionsOutOfBase($this->hasSectionsOutOfBase($sections));
      $trail->setSumOfPointsGOT($sumOfPoints);
      $entityManager->flush();
      
      $this->deleteSectionTrail($idT, $session);
      $sectionNumber = 0;
      foreach($sections as $currentSection){
        $section = $this->getDoctrine()->getRepository(Section::class)->findOneByIdS($currentSection->getIdS());
        $this->createNewSectionTrail($trail, $section, $sectionNumber);
        $sectionNumber++;
      }
    } else {
      return $this->render('modifyTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints, 'failure' => true));
    }
    $session->remove('modyfying');
    $session->remove('trail');
    $session->remove('date');
    $session->remove('ownSectionId');
    $session->remove('sumOfPoints');

    return $this->render('modifyTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints, 'success' => true));
  }

  /**
   * @param Section[] $sections
   * @return boolean
   */
  private function hasSectionsOutOfBase($sections)
  {
    $outOfBase = false;
    foreach($sections as $section){
      if($section->getIsOutOfBase()){
        $outOfBase = true;
      }
    }
    return $outOfBase;
  }

  /**
   * @param Int $idS
   * @param SessionInterface $session
   * @return void
   */
  private function sectionModified(Int $idS, SessionInterface $session)
  {
    $currentSectionsArray = $session->get('currentSectionsArray');
    for($i=0; $i<count($currentSectionsArray); $i++){
      if($currentSectionsArray[$i]->getIdS() == $idS){
        $doctrine = $this->getDoctrine();
        $currentSectionsArray[$i] = $doctrine->getRepository(Section::class)->findOneByIdS($idS);
      }
    }
    $session->set('currentSectionsArray', $currentSectionsArray);
    return $this->getTralSections($session);
  }
}
