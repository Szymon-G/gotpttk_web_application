<?php
  namespace App\Controller;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
  use Symfony\Component\HttpFoundation\Session\SessionInterface;
  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use App\Repository\TouristRepository;
  use App\Entity\Tourist;
  use Symfony\Component\HttpFoundation\Session\Session;

  class ProgramController extends AbstractController {
  /**
    * @Route("/")
   * @param SessionInterface $session
   * @return void
   */
  public function index(SessionInterface $session)
  {
    $logged = $session->get('logged');
    return $this->render('index.html.twig', array('logged' => $logged));
  }

  /**
   * @Route("/alert")
   * @return void
   */
  public function alert()
  {
    return $this->render('alert.html.twig');
  }


  /**
   * @Route("/login", name="login")
   * @return void
   */
  public function login()
  {
    $session = $this->get('session');
    $session->clear();
    return $this->render('login.html.twig', array('login' => ''));
  }

  /**
   * @Route("/resetPassword")
   * @return void
   */
  public function resetPassword()
  {
    return $this->render('resetPassword.html.twig');
  }

  /**
   * @Route("/verifyLogin", methods={"POST"})
   * @return void
   */
  public function verifyLogin()
  {
    $request = Request::createFromGlobals();
    $bEmail = false;
    $bPassword = false;
    $tourist = null;
    //from post
    $email = $request->request->get('email');
    $password = $request->request->get('password');

    [$bEmail, $tourist] = $this->checkEmail($email);
    //filtering
    $passwordF = filter_var($password, FILTER_SANITIZE_STRING);
    
    if($bEmail){  
      //check password
      if($password==$passwordF && $tourist->getPassword() == $password){
        $bPassword = true;
          
        //setting sessions parameters
        $session = $this->get('session');
        $session->start();
        $session->set('id', $tourist->getIdTu());
        $session->set('imie', $tourist->getFirstName());
        $session->set('nazwisko', $tourist->getLastName());
        $session->set('logged', true);

        return $this->redirect('book');
      }    
      else{
        //password incorrect message
        $this->addFlash('password','visible');
      }
    }
    //email incorrect message
    if(!$bEmail){
      $this->addFlash('email','visible');
    }
    return $this->render('login.html.twig', array('login' => $email));
  }

  /**
   * @Route("/reset", methods={"POST"})
   * @return void
   */
  public function reset()
  {
    $request = Request::createFromGlobals();
    $bEmail = false;

    $email = $request->request->get('email');
    $tourist = null;

    [$bEmail, $tourist] = $this->checkEmail($email);
    if($bEmail){
        $entityManager = $this->getDoctrine()->getManager();
        $tourist->setPassword("password");
        $entityManager->flush();
        $this->addFlash('password','visible');
      }    
      else{
        $this->addFlash('email','visible');
      }
    return $this->render('resetPassword.html.twig', array('login' => $email));
  }

  private function checkEmail($email)
  {
    $bEmail = false;
    $emailF = filter_var($email, FILTER_SANITIZE_EMAIL);
    $tourist = null;
    if($email==$emailF && filter_var($emailF, FILTER_VALIDATE_EMAIL)==true){
      $repository = $this->getDoctrine()->getRepository(Tourist::class);
      $tourist = $repository->findOneByLogin($emailF);
      if(!is_null($tourist)){
        $bEmail = true;
      }
    }
    return [$bEmail, $tourist];
  }

  public function checkEmailString($email)
  {
    $bEmail = false;
    $emailF = filter_var($email, FILTER_SANITIZE_EMAIL);
    $tourist = null;
    if($email==$emailF && filter_var($emailF, FILTER_VALIDATE_EMAIL)==true){return true;}
    return false;
  }
}

