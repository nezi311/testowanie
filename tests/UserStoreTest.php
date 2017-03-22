<?php
// dopisać data providera do testowania wielu userów



//require_once("/opt/lampp/htdocs/testowanie/src/UserStore.php");
  require_once("E:/xampp/htdocs/testowanieOprogramowania/src/UserStore.php");

class UserStoreTest extends PHPUnit_Framework_TestCase
{
  private $store;

  public function setUp()
  {
    $this->store = new UserStore();
  }

  public function tearDown()
  {
    $this->store = NULL;
  }

  public function testGetUser()
  {
    $this->store->addUser("Tomasz","tm@tm.pl","tm2 0 1 7");
    $user = $this->store->getUser("tm@tm.pl");

    $this->assertEquals($user['name'],"Tomasz");
    $this->assertEquals($user['mail'],"tm@tm.pl");
    $this->assertEquals($user['pass'],"tm2 0 1 7");
    $this->assertTrue($this->store->addUser("Marek","m@m.pl","mm2017"));

    try
    {
      $this->store->addUser("Franek","m@m.pl","mm2 0 1 7");
      $this->fail("Oczekiwany wyjątek użytkownik istnieje");
    }
    catch(Exception $e){}
  }
}
 ?>
