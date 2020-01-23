<?php

namespace App\Tests\Controller;
use App\Controller\ProgramController;
use PHPUnit\Framework\TestCase;

class Program extends TestCase
{
 public function testCheckEmailString()
  {
    //przykładowy adres email
    $email = 'user@user.pl';
    //utworzenie kontrolera programu
    $programController = new ProgramController();
    //wywołanie funkcji sprawdzania poprawności adresu email
    $bEmail = $programController->checkEmailString($email);
    //assert
    $this->assertEquals(true, $bEmail);

    $email = 'DROP DATABASE;';
    $bEmail = $programController->checkEmailString($email);
    $this->assertEquals(false, $bEmail);

    $email = 'qwerty123r@usersdfsdaf';
    $bEmail = $programController->checkEmailString($email);
    $this->assertEquals(false, $bEmail);
    
    $email = 'user@user.1234';
    $bEmail = $programController->checkEmailString($email);
    $this->assertEquals(false, $bEmail);
    
    $email = 'useruser.pl';
    $bEmail = $programController->checkEmailString($email);
    $this->assertEquals(false, $bEmail);

  }
}