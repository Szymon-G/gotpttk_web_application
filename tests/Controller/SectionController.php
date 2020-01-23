<?php

namespace App\Tests\Controller;
use App\Controller\SectionController;
use PHPUnit\Framework\TestCase;

class Section extends TestCase
{
 public function testCountPoints()
  {
    //utworzenie kontrolera odcinka
    $sectionController = new SectionController();
    //wywołanie funkcji liczenia punktów dla podanej długości i przewyższenia
    $points = $sectionController->countPoints(1000,1000);
    //assert
    $this->assertEquals(11, $points);

    $points = $sectionController->countPoints(99999,9999);
    $this->assertEquals(198, $points);

    $points = $sectionController->countPoints(0,0);
    $this->assertEquals(0, $points);

    $points = $sectionController->countPoints(1225.4,0);
    $this->assertEquals(1, $points);

    $points = $sectionController->countPoints(0,4599.999);
    $this->assertEquals(45, $points);

  }
}