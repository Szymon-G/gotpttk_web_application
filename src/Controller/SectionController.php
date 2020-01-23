<?php

namespace App\Controller;

use App\Entity\MountainGroup;
use App\Entity\Section;
use App\Entity\Point;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SectionController extends AbstractController
{
  /**
   * Method renders a main view for /findSection with groups
   * 
   * @Route("/findSection", name="findSection")
   * @param SessionInterface $session
   * @return void
  */
  public function findSection(SessionInterface $session)
  {    
    $logged = $session->get('logged');
    $mountainGroups = $this->getDoctrine()->getRepository(MountainGroup::class)->findAll();
    return $this->render('findSection.html.twig', array('mountainGroups' => $mountainGroups, 'logged' => $logged));
  }

  /**
   * Method renders a view for /findSection for certain group
   * 
   * @Route("/findSection_group{id}")
   * @param Int $id
   * @param SessionInterface $session
   * @return void
   */
  public function findSectionIdGroup(int $id, SessionInterface $session)
  {
    $logged = $session->get('logged');
    $doctrine = $this->getDoctrine();
    $mountainGroup = $doctrine->getRepository(MountainGroup::class)->find($id);
    $endPoints = $doctrine->getRepository(Section::class)->getDistinctEndPointsFromGroup($id);
    $startPoints = array();
    foreach ($endPoints as $endPoint) {
      $startPointsForEndPoint = $doctrine->getRepository(Section::class)
        ->findBy(['endPoint' => $endPoint->getEndPoint()]);
      array_push($startPoints, $startPointsForEndPoint);
    }
    return $this->render(
      'findSectionIdGroup.html.twig',
      array('mountainGroup' => $mountainGroup, 'endPoints' => $endPoints, 'startPoints' => $startPoints, 'logged' => $logged)
    );
  }

  /**
   * Method renders view for finding result
   * 
   * @Route("/findSection_result", methods={"POST"})
   * @param SessionInterface $session
   * @return void
  */
  public function findSectionResult(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $request = Request::createFromGlobals();
    $sectionName = $request->request->get('sectionName');
    if($sectionName == ''){
      $this->addFlash('noNameError','visible');      
      return $this->redirectToRoute('findSection');
    }
    $sectionGroup = $request->request->get('sectionGroup');
    $doctrine = $this->getDoctrine();
    $results = $doctrine->getRepository(Section::class)->findByNameAndGroup($sectionName, $sectionGroup);
    return $this->render('findSectionResult.html.twig', array('results' => $results, 'logged' => $logged));
  }

  /**
   * Method renders view for /addSection with request GET from createTrail
   * 
   * @Route("/addSection", methods={"GET"})
   * @param SessionInterface $session
   * @return void
  */
  public function addSection(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $mountainGroups = $this->getDoctrine()->getRepository(MountainGroup::class)->findAll();
    return $this->render('addSection.html.twig', array('mountainGroups' => $mountainGroups, 'logged' => $logged));
  }

  /**
   * Method renders view for /addSection with request from createTrail for certain mountain group
   * 
   * @Route("/addSection_group{id}")
   * @param Int $id
   * @param SessionInterface $session
   * @return void
   */
  public function addSectionIdGroup(Int $id, SessionInterface $session)
  {
    $logged = $session->get('logged');
    $doctrine = $this->getDoctrine();
    $mountainGroup = $doctrine->getRepository(MountainGroup::class)->find($id);
    $endPoints = $doctrine->getRepository(Section::class)->getDistinctEndPointsFromGroup($id);
    $startPoints = array();
    foreach ($endPoints as $endPoint) {
      $startPointsForEndPoint = $doctrine->getRepository(Section::class)
        ->findBy(['endPoint' => $endPoint->getEndPoint()]);
      array_push($startPoints, $startPointsForEndPoint);
    }
    return $this->render(
      'addSectionIdGroup.html.twig',
      array('mountainGroup' => $mountainGroup, 'endPoints' => $endPoints, 'startPoints' => $startPoints, 'logged' => $logged)
    );
  }

  /**
   * Method renders view for /addSection with request from results of finding
   * 
   * @Route("/addSection_result", methods={"POST"})
   * @param SessionInterface $session
   * @return void
   */
  public function addSectionResult(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $request = Request::createFromGlobals();
    $sectionName = $request->request->get('sectionName');
    $sectionGroup = $request->request->get('sectionGroup');
    $doctrine = $this->getDoctrine();
    $results = $doctrine->getRepository(Section::class)->findByNameAndGroup($sectionName, $sectionGroup);
    return $this->render('addSectionResult.html.twig', array('results' => $results, 'logged' => $logged));
  }

  /**
   * Method get values from forms and creates new section
   * 
   * @Route("/createOwnSection", methods="POST")
   * @param SessionInterface $session
   * @return void
   */
  public function createOwnSectionSave(SessionInterface $session)
  {
    $request = Request::createFromGlobals();
    $sectionBegin = $request->request->get('section_begin');
    $sectionEnd = $request->request->get('section_end');
    $sectionGroupId = $request->request->get('section_group');
    $sectionLength = $request->request->get('section_length');
    $sectionHeight = $request->request->get('section_height');
    if(!($sectionBegin && $sectionEnd && $sectionGroupId && $sectionLength && $sectionHeight)){
      return $this->forward('App\Controller\SectionController::createOwnSection', array('error'=>true));
    }
    $sectionBegin = filter_var($sectionBegin, FILTER_SANITIZE_STRING);
    $sectionEnd = filter_var($sectionEnd, FILTER_SANITIZE_STRING);
    $sectionLength = filter_var($sectionLength, FILTER_VALIDATE_INT);
    $sectionHeight = filter_var($sectionHeight, FILTER_VALIDATE_INT);
    $entityManager = $this->getDoctrine()->getManager();
    $pointsGOT = floor($sectionLength/1000) + floor($sectionHeight/100);
    
    $startPoint = new Point();
    $startPoint->setName($sectionBegin);
    $endPoint = new Point();
    $endPoint->setName($sectionEnd);
    $group = $entityManager->getRepository(MountainGroup::class)->find($sectionGroupId);
    $section = new Section(0, $pointsGOT, $sectionLength, $sectionHeight, $startPoint, $endPoint, true, $group);

    $entityManager->persist($startPoint);
    $entityManager->persist($endPoint);
    $entityManager->persist($section);
    $entityManager->flush();
    $session->set('ownSectionId', $section->getIdS());
    return $this->redirectToRoute('trailsView', array('ownSection' => $section), 307);
  }

  /**
   * Methods renders a view for form of createing own section
   * 
   * @Route("/createOwnSection")
   * @param SessionInterface $session
   * @param boolean $error
   * @return void
   */
  public function createOwnSection(SessionInterface $session, $error=false)
  {
    $logged = $session->get('logged');
    $mountainGroups = $this->getDoctrine()->getRepository(MountainGroup::class)->findAll();
    if ($error){
      return $this->render('createOwnSection.html.twig', array('mountainGroups' => $mountainGroups, 'logged' => $logged, 'alertEmptyFields' => true));
    }
    else return $this->render('createOwnSection.html.twig', array('mountainGroups' => $mountainGroups, 'logged' => $logged));
  }

  /**
  * @Route("/modifyOwnSectionSave", methods="POST")
  * @param SessionInterface $session
  * @return void
  */
  public function modifyOwnSectionSave(SessionInterface $session)
  {
    $request = Request::createFromGlobals();
    $sectionBegin = $request->request->get('section_begin');
    $sectionEnd = $request->request->get('section_end');
    $sectionGroupId = $request->request->get('section_group');
    $sectionLength = $request->request->get('section_length');
    $sectionHeight = $request->request->get('section_height');
    $idS = $request->request->get('idS');
    $idSP = $request->request->get('idSP');
    $idEP = $request->request->get('idEP');

    $sectionBegin = filter_var($sectionBegin, FILTER_SANITIZE_STRING);
    $sectionEnd = filter_var($sectionEnd, FILTER_SANITIZE_STRING);
    $sectionLength = filter_var($sectionLength, FILTER_VALIDATE_INT);
    $sectionHeight = filter_var($sectionHeight, FILTER_VALIDATE_INT);
    $entityManager = $this->getDoctrine()->getManager();
    $pointsGOT = floor($sectionLength/1000) + floor($sectionHeight/100);
    
    $doctrine = $this->getDoctrine();
    $startPoint = $doctrine->getRepository(Point::class)->findOneByIdP($idSP);
    $endPoint = $doctrine->getRepository(Point::class)->findOneByIdP($idEP);
    $section = $doctrine->getRepository(Section::class)->findOneByIdS($idS);

    $startPoint->setName($sectionBegin);
    $endPoint->setName($sectionEnd);
    $section->setSectionLength($sectionLength);
    $section->setElevationGain($sectionHeight);

    $group = $entityManager->getRepository(MountainGroup::class)->find($sectionGroupId);
    $section->setIdG($group);
    $section->setPointsGOT($pointsGOT);
    
    $entityManager->flush();

    return $this->redirectToRoute('modify', array('modifiedIdS' => $idS), 307);
  }

  /**
   * @Route("/modifyOwnSection", methods="POST", name="modify_own")
    * @param SessionInterface $session
    * @param boolean $error
    * @return void
  */
  public function modifyOwnSection(SessionInterface $session, $error=false)
  {
    $logged = $session->get('logged');
    $request = Request::createFromGlobals();
    $idSP = $request->request->get('startPoint');
    $idEP = $request->request->get('endPoint');
    $idG = $request->request->get('idG');

    $doctrine = $this->getDoctrine();
    $startPoint = $doctrine->getRepository(Point::class)->findOneByIdP($idSP);
    $endPoint = $doctrine->getRepository(Point::class)->findOneByIdP($idEP);
    
    $length = $request->request->get('length');
    $elevation = $request->request->get('elevation');
    $idS = $request->request->get('idS');
    $mountainGroups = $this->getDoctrine()->getRepository(MountainGroup::class)->findAll();
    if ($error){
      return $this->render('modifyOwnSection.html.twig', array('mountainGroups' => $mountainGroups, 'logged' => $logged, 'alertEmptyFields' => true));
    }
    else return $this->render('modifyOwnSection.html.twig', array('mountainGroups' => $mountainGroups, 'logged' => $logged,
                      'startPoint'=>$startPoint, 'endPoint'=>$endPoint, 'length'=>$length, 'elevation'=>$elevation, 
                      'idGroup'=>$idG, 'idS'=>$idS, 'idSP'=>$idSP, 'idEP'=>$idEP));
  }

  public function countPoints($length, $height)
  {
    return floor($length/1000) + floor($height/100);
  }

}
