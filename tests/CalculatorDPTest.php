<?php
require_once("/opt/lampp/htdocs/testowanie/src/Calculator.php");
//use PHPUnit\Framework\TestCase;

class CalculatorDPTests extends PHPUnit_Framework_TestCase
{
  private $calculator;

  protected function setUp()
  {
    $this->calculator = new Calculator();
  }

  protected function tearDown()
  {
    $this->calculator = NULL;
  }

  public function addDataProvider()
  {
    return array(
      array(4,2,6),
      array(-4,12,8),
      array(14,-28,-14),
    );
  }

  /**
      @dataProvider addDataProvider
  */

  public function testAdd($a , $b , $expected)
  {
    $result = $this->calculator->add($a, $b);
    $this->assertTrue($expected == $result);
  }



  public function divDataProvider()
  {
    return array(
      array(4,2,2),
      array(12,12,1),
      array(5,2,2.5),
      array(1,0,0),
      array(0,1,0),
    );
  }

  /**
      @dataProvider divDataProvider
  */

  public function testDiv($a , $b , $expected)
  {
    $result = $this->calculator->div($a, $b);
    $this->assertTrue($expected == $result);
  }



}


 ?>
