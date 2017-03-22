<?php
//require_once("/opt/lampp/htdocs/testowanie/src/Calculator.php");
  require_once("E:/xampp/htdocs/Dominiak_Dawid_testowanieOprogramowania/src/Calculator.php");
//use PHPUnit\Framework\TestCase;

class CalculatorTests extends PHPUnit_Framework_TestCase
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

  public function testAdd()
  {
    $result = $this->calculator->add(1,2);
    $this->assertEquals(3,$result);
  }

  public function testAddWithZero()
  {
    $result = $this->calculator->add(0,0);
    $this->assertEquals(0,$result);
  }

  public function testAddWithNegative()
  {
    $result = $this->calculator->add(-1,-1);
    $this->assertEquals(-2,$result);
  }

}


 ?>
