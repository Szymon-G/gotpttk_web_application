<?php

namespace App\Tests\Controller;

use App\Entity\Section;
use App\Entity\Point;
use App\Entity\MountainGroup;
use App\Controller\TrailController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;

class Trail extends TestCase
{
  /**
   * Test for isTrailValid function
   * @return void
   */
  public function testIsTrailValid()
  {
    //Get access to controller and session
    $trailController = new TrailController();
    $session = new Session(new MockArraySessionStorage());
    //create test Points and Mountain Groups
    $startPoint = new Point();
    $startPoint->setName('Kozi Wierch');
    $endPoint = new Point();
    $endPoint->setName('Smocza Jama');
    $mountainGroupTatry1 = new MountainGroup(11, 'TATRY WYSOKIE', 'T.01');
    $mountainGroupTatry2 = new MountainGroup(12, 'TATRY WYSOKIE', 'T.02');
    $mountainGroupBeskid = new MountainGroup(13, 'BESKID ŚLĄSKI', 'BZ.01');

    //test 1
    $sectionsArray = array();
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->isTrailValid($session);
    $this->assertEquals(false, $result);

    //test 2
    $section1 = new Section(1, 12, 120, 1240, $startPoint, $endPoint, true, $mountainGroupTatry1);
    $section2 = new Section(2, 2, 126, 243, $startPoint, $endPoint, true, $mountainGroupTatry1);
    $section3 = new Section(3, 2, 120, 240, $startPoint, $endPoint, true, $mountainGroupTatry2);
    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->isTrailValid($session);
    $this->assertEquals(true, $result);

    //test 3
    $section1 = new Section(11, 4, 120, 240, $startPoint, $endPoint, true, $mountainGroupTatry1);
    $section2 = new Section(11, 4, 1120, 340, $startPoint, $endPoint, true, $mountainGroupTatry1);
    $section3 = new Section(11, 11, 120, 240, $startPoint, $endPoint, true, $mountainGroupTatry1);
    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->isTrailValid($session);
    $this->assertEquals(false, $result);

    //test 4
    $section1 = new Section(34, 1, 122, 940, $startPoint, $endPoint, true, $mountainGroupTatry1);
    $section2 = new Section(18, 14, 126, 247, $startPoint, $endPoint, true, $mountainGroupTatry1);
    $section3 = new Section(91, 0, 320, 40, $startPoint, $endPoint, true, $mountainGroupBeskid);
    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->isTrailValid($session);
    $this->assertEquals(false, $result);

    //test 5
    $section1 = new Section(12, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroupBeskid);
    $section2 = new Section(28, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroupBeskid);
    $section3 = new Section(28, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroupTatry2);
    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->isTrailValid($session);
    $this->assertEquals(false, $result);

    //test 6
    $section1 = new Section(15, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroupTatry2);
    $section2 = new Section(15, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroupTatry2);
    $section3 = new Section(16, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroupTatry2);
    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->isTrailValid($session);
    $this->assertEquals(false, $result);

    //test 7
    $section1 = new Section(10, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroupBeskid);
    $section2 = new Section(99, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroupBeskid);
    $section3 = new Section(10, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroupBeskid);
    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->isTrailValid($session);
    $this->assertEquals(false, $result);

    //test 8
    $section1 = new Section(11, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroupBeskid);
    $section2 = new Section(99, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroupBeskid);
    $section3 = new Section(10, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroupBeskid);
    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->isTrailValid($session);
    $this->assertEquals(true, $result);
  }

  /**
   * Test for getTralSections() method
   *
   * @return void
   */
  public function testGetTralSections()
  {
    //Get access to controller and session
    $trailController = new TrailController();
    $session = new Session(new MockArraySessionStorage());

    //create test Points and Mountain Groups
    $startPoint = new Point();
    $startPoint->setName('Kozia Góra');
    $endPoint = new Point();
    $endPoint->setName('Schroonisko PTTK Domek');
    $mountainGroup = new MountainGroup(11, 'TATRY WYSOKIE', 'T.01');

    //test 1
    $sectionsArray = array();
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->getTralSections($session);
    $expectedResult = array(array(), 0);
    $this->assertEquals($expectedResult, $result);

    //test 2
    $section1 = new Section(1, 1, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $sectionsArray = array($section1);
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->getTralSections($session);
    $expectedResult = array(array($section1), 1);
    $this->assertEquals($expectedResult, $result);

    //test 3
    $section1 = new Section(11, 0, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section2 = new Section(2, 0, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section3 = new Section(3, 0, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->getTralSections($session);
    $expectedResult = array(array($section1, $section2, $section3), 0);
    $this->assertEquals($expectedResult, $result);

    //test 4
    $section1 = new Section(1, 1, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section2 = new Section(2, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section3 = new Section(3, 4, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->getTralSections($session);
    $expectedResult = array(array($section1, $section2, $section3), 17);
    $this->assertEquals($expectedResult, $result);

    //test 5
    $section1 = new Section(11, 0, 244, 249, $startPoint, $endPoint, true, $mountainGroup);
    $section2 = new Section(12, 1, 1200, 264, $startPoint, $endPoint, true, $mountainGroup);
    $section3 = new Section(13, 0, 570, 240, $startPoint, $endPoint, true, $mountainGroup);
    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);
    $result = $trailController->getTralSections($session);
    $expectedResult = array(array($section1, $section2, $section3), 1);
    $this->assertEquals($expectedResult, $result);
  }
}