<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Tourist;
use App\Entity\Trail;
use App\Entity\SectionTrail;
use App\Entity\BookDegree;
use App\Entity\Book;
use App\Entity\Degree;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class BookController extends AbstractController
{
  /**
   * @Route("/book")
   * @param SessionInterface $session
   * @return void
   */
  public function index(SessionInterface $session)
  {
    $imie = $session->get('imie');
    $nazwisko = $session->get('nazwisko');
    $logged = $session->get('logged');
    if(!isset($logged)){
      return $this->redirectToRoute('login');
    }
    $idB = $this->getDoctrine()->getRepository(Tourist::class)->findOneByIdTu($session->get('id'))->getIdB();
    $session->set('idB', $idB);
    $book = $this->getDoctrine()->getRepository(Book::class)->findOneByIdB($idB);
    $bookDegrees = $this->getDoctrine()->getRepository(BookDegree::class)->findByIdB($idB);

    $degree = new Degree(0,0);
    foreach($bookDegrees as $bookDegree){
      $degree = $bookDegree->getIdD();  
    }
    $degreeName = $degree->getName();

    $trails = $this->getDoctrine()->getRepository(Trail::class)->findByIdBook($idB);
    $sumPoints = 0;

    foreach($trails as $trail){
      $sumPoints+=$trail->getSumOfPointsGOT();
    }
    if($book->getNumberOfPoints()!=$sumPoints){
      $entityManager = $this->getDoctrine()->getManager();
      $book->setNumberOfPoints($sumPoints);
      $entityManager->flush();
    }

    return $this->render('book.html.twig', [
      'imie' => $imie, 'nazwisko' => $nazwisko, 'logged' => $logged, 'degree' => $degreeName, 'points' => $sumPoints
    ]);
  }
}
