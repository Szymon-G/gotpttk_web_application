<?php

namespace App\Controller;

use App\Entity\MountainGroup;
use App\Entity\Section;
use App\Entity\Book;
use App\Entity\SectionTrail;
use App\Entity\Trail;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class TrailController extends AbstractController
{
  /**
   * @Route("/createTrail_save", methods={"POST"})
   */
  public function createTrailSave(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $idB = $session->get('idB');
    $date = $session->get('date');
    [$sections, $sumOfPoints] = $this->getTrail($session);

    if ($logged) {
      if (empty($sections)) return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints, 'noSections' => true));
      if ($this->isTrailValid($session)) {
        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->find($idB);
        $trail = new Trail(0, false, false, false, date_create($date), $book);
        $entityManager->persist($trail);
        $entityManager->flush();
        $trail = $entityManager->getRepository(Trail::class)->find($trail->getIdT());
        $currentSectionsArray = $session->get('currentSectionsArray');
        foreach ($currentSectionsArray as $currentSection) {
          $section = $entityManager->getRepository(Section::class)->find($currentSection->getIdS());
          $this->createNewSectionTrail($trail, $section);
        }
      } else {
        return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints, 'failure' => true));
      }
    } else {
      return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints, 'logToSave' => true));
    }
    return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints, 'success' => true));
  }

  /**
   * @Route("/createTrail", methods={"POST"}, name="trailsView")
   */
  public function createTrail(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $request = Request::createFromGlobals();
    $deleteSectionKey = $request->request->get('deleteSectionKey');
    $idS = $request->request->get('idS'); 
    if(!isset($idS)) {
      $idS = $session->get('ownSectionId');
      $session->set('ownSectionId', null);
    }
    $sections = null;
    $sumOfPoints = 0;
    $date = $session->get('date');
    // return new Response('<html><body><h1>' . $idS.'</h1></body></html>');
    if (isset($idS)) {
      if($idS == 0) [$sections, $sumOfPoints] = $this->getTrail($session);
      else [$sections, $sumOfPoints] = $this->generateTrail($idS, $session);
    } else if (isset($deleteSectionKey)) {
      [$sections, $sumOfPoints] = $this->deleteSection($deleteSectionKey, $session);
    } else {
      $session->set('currentSectionsArray', array());
    }

    if (empty($sections)) return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date));
    else return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints));
  }

  /**
   * @Route("/createTrail", name="putDate")
   */
  public function index(SessionInterface $session)
  {
    $logged = $session->get('logged');
    return $this->render('createTrail.html.twig', array('logged' => $logged));
  }

  /**
   * @Route("/createTrail_check", methods={"POST"})
   */
  public function createTrailCheckDate(SessionInterface $session)
  {
    $request = Request::createFromGlobals();
    $date = $request->request->get('date');
    if($date){
      $session->set('date', $date);
      return $this->forward('App\Controller\TrailController::createTrail');
    }else{
      $this->addFlash('date','visible');
      return $this->redirectToRoute('putDate');
    }
  }

  private function generateTrail($idS, SessionInterface $session)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $currentSectionsArray = $session->get('currentSectionsArray');
    $section = $entityManager->getRepository(Section::class)->find($idS);
    array_push($currentSectionsArray, $section);
    $session->set('currentSectionsArray', $currentSectionsArray);
    return $this->getTrail($session);
  }

  private function deleteSection($deleteSectionKey, SessionInterface $session)
  {
    $currentSectionsArray = $session->get('currentSectionsArray');
    unset($currentSectionsArray[$deleteSectionKey]);
    $currentSectionsArray = array_values($currentSectionsArray);
    $session->set('currentSectionsArray', $currentSectionsArray);
    return $this->getTrail($session);
  }

  private function getTrail(SessionInterface $session)
  {
    $currentSectionsArray = $session->get('currentSectionsArray');
    $sumOfPoints = 0;
    foreach ($currentSectionsArray as $currentSection) {
      $sumOfPoints += $currentSection->getPointsGOT();
    }
    return (array($currentSectionsArray, $sumOfPoints));
  }

  private function isTrailValid(SessionInterface $session)
  {
    $currentSectionsArray = $session->get('currentSectionsArray');
    $isValid = true;
    $sectionsIds = array();
    foreach ($currentSectionsArray as $currentSection) {
      array_push($sectionsIds, $currentSection->getIdS());
    }
    foreach (array_count_values($sectionsIds) as $id) {
      if ($id > 1) $isValid = false;
    }
    return $isValid;
  }

  /**
   * @Route("/trailsList")
   */
  public function list(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $idB = $session->get('idB');

    $doctrine = $this->getDoctrine();
    $trails = $doctrine->getRepository(Trail::class)->findBy(array('idBook'=>$idB),array('trailDate'=>'DESC'));

    $allTrails = array();

    foreach($trails as $trail){
      $allSectionsTrail = array();
      $sectionsTrail = $doctrine->getRepository(SectionTrail::class)->findByIdT($trail->getIdT());
      
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
   * @Route("/modifyTrail", methods={"POST"})
   */
  public function modifyTrail(SessionInterface $session)
  {
    $request = Request::createFromGlobals();
    $trailId = $request->request->get('modifyTrailId');
    //$idB = $session->get('idB');
    $doctrine = $this->getDoctrine();

    $trail = $doctrine->getRepository(Trail::class)->findOneByIdT($trailId);
    $sectionsTrail = $doctrine->getRepository(SectionTrail::class)->findByIdT($trailId);
    $sections = array();
    foreach($sectionsTrail as $sectionTrail){
      array_push($sections, $sectionTrail->getIdS());
    }
    $date = $trail->getTrailDateString();
    
    $session->set('date', $date);  
    $session->set('trail', $trailId);

    $points = $trail->getSumOfPointsGOT();

      //return $this->forward('App\Controller\TrailController::createTrail');

    return $this->render('modifyTrail.html.twig', 
                          array('logged' => true, 'date' => $date, 'sections' => $sections, 
                          'sumOfPoints' => $points));
  }

  private function createNewSectionTrail($trail, $section)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $sectionTrail = new SectionTrail($trail, $section);
    $entityManager->persist($sectionTrail);
    $entityManager->flush();
  }
}
