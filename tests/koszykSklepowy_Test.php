<?php

//require_once("/opt/lampp/htdocs/testowanie/src/Calculator.php");
require_once("E:/xampp/htdocs/Dominiak_Dawid_testowanieOprogramowania/src/Towar.php");
require_once("E:/xampp/htdocs/Dominiak_Dawid_testowanieOprogramowania/src/KoszykSklepowy.php");




$koszyk = new KoszykSklepowy();



class koszykSklepowy_Test extends PHPUnit_Framework_TestCase
{
  private $koszyk;
  private $towar;

  protected function setUp()
  {
    $this->koszyk = new KoszykSklepowy();
    $this->towar = new Towar();
  }

  protected function tearDown()
  {
    $this->koszyk = NULL;
    $this->towar = NULL;
  }

  public function testAdd()
  {
    $towar1 = new Towar();
    $towar1->ustawId(1);
    $towar1->ustawNazwa("Płyty CD");
    $towar1->ustawCena(0.90);
    $towar1->ustawVat(23);

    $result = $this->koszyk->dodajTowar($towar1);
    $this->assertTrue(true==$result);
  }

  public function testValue()
  {
    $towar1 = new Towar();
    $towar1->ustawId(1);
    $towar1->ustawNazwa("Płyty CD");
    $towar1->ustawCena(1.50);
    $towar1->ustawVat(23);

    $this->koszyk->dodajTowar($towar1);

    $result = $this->koszyk->cenaTowarowNaPozycji(0);
    $this->assertEquals(1.50,$result);
  }

  public function testUsun1()
  {
    $towar1 = new Towar();
    $towar1->ustawId(1);
    $towar1->ustawNazwa("Płyty CD");
    $towar1->ustawCena(1.50);
    $towar1->ustawVat(23);

    $this->koszyk->dodajTowar($towar1);
    $this->koszyk->usunTowary();
    $result = $this->koszyk->usunTowar($towar1);
    $this->assertTrue(false==$result);
  }

  public function testUsun2()
  {
    $towar1 = new Towar();
    $towar1->ustawId(1);
    $towar1->ustawNazwa("Płyty CD");
    $towar1->ustawCena(1.50);
    $towar1->ustawVat(23);

    $this->koszyk->dodajTowar($towar1);
    $this->koszyk->usunTowar($towar1);
    $this->koszyk->usunTowar($towar1);
    $result =  $this->koszyk->liczTowatyWKoszyku();
    $this->assertEquals(0,$result);
  }

  public function testUsun3()
  {
   $pendrive = new Towar();
   $pendrive->ustawId(1);
   $pendrive->ustawNazwa("Pendrive 8GB");
   $pendrive->ustawCena(19.99);
   $pendrive->ustawVat(23);
   $pendrive2 = new Towar();
   $pendrive2->ustawId(2);
   $pendrive2->ustawNazwa("Pendrive 18GB");
   $pendrive2->ustawCena(39.99);
   $pendrive2->ustawVat(23);
   $this->koszyk->dodajTowar($pendrive);
   $this->koszyk->dodajTowar($pendrive2);
   $this->koszyk->usunTowar($pendrive);
   $result = $this->koszyk->liczTowatyWKoszyku();
   $this->assertEquals(1,$result);
  }

  public function testDodajx2()
  {
    $towar1 = new Towar();
    $towar1->ustawId(1);
    $towar1->ustawNazwa("Płyty CD");
    $towar1->ustawCena(1.50);
    $towar1->ustawVat(23);

    $towar2 = new Towar();
    $towar2->ustawId(2);
    $towar2->ustawNazwa("Płyty CD");
    $towar2->ustawCena(0.90);
    $towar2->ustawVat(23);

    $this->koszyk->dodajTowar($towar1);

    $result = $this->koszyk->dodajTowar($towar2);
    $this->assertTrue(true==$result);
  }

  public function testZmianaIlosciUjemna()
  {
    $towar1 = new Towar();
    $towar1->ustawId(1);
    $towar1->ustawNazwa("Płyty CD");
    $towar1->ustawCena(1.50);
    $towar1->ustawVat(23);

    $result =$this->koszyk->aktualizujTowar($towar1,-3);
    $this->assertTrue(false==$result);
  }

  public function testZmianaIlosciZmiennoprzecinkowa()
  {
    $towar1 = new Towar();
    $towar1->ustawId(1);
    $towar1->ustawNazwa("Płyty CD");
    $towar1->ustawCena(1.50);
    $towar1->ustawVat(23);

    $result =  $this->koszyk->aktualizujTowar($towar1,2.5);
    $this->assertTrue(false==$result);
  }

  public function testUjemnaCena()
  {
    $this->towar->ustawId(1);
    $this->towar->ustawNazwa("Płyty CD");
    $this->towar->ustawVat(23);

    $result = $this->towar->ustawCena(-1.50);
    $this->assertTrue(false==$result);
  }

  public function testUjemnyVat()
  {
    $this->towar = new Towar();
    $this->towar->ustawId(1);
    $this->towar->ustawNazwa("Płyty CD");
    $this->towar->ustawCena(1.50);


    $result = $this->towar->ustawVat(-23);
    $this->assertTrue(false==$result);
  }

  public function testZmianyLiczbyTowarow()
  {
    $towar1 = new Towar();
    $towar1->ustawId(1);
    $towar1->ustawNazwa("Płyty CD");
    $towar1->ustawCena(1.50);
    $towar1->ustawVat(23);

    $towar2 = new Towar();
    $towar2->ustawId(2);
    $towar2->ustawNazwa("Makaron");
    $towar2->ustawCena(1.90);
    $towar2->ustawVat(23);

    $this->koszyk->dodajTowar($towar2);
    $this->koszyk->dodajTowar($towar1);
    $this->koszyk->dodajTowar($towar1);

    $result = $this->koszyk->liczTowatyWKoszyku();
    $this->assertEquals(3,$result);

  }

  public function testZmianyLiczbyTowarow2()
  {
    $towar1 = new Towar();
    $towar1->ustawId(1);
    $towar1->ustawNazwa("Płyty CD");
    $towar1->ustawCena(1.50);
    $towar1->ustawVat(23);

    $towar2 = new Towar();
    $towar2->ustawId(2);
    $towar2->ustawNazwa("Makaron");
    $towar2->ustawCena(1.90);
    $towar2->ustawVat(23);

    $this->koszyk->dodajTowar($towar2);
    $this->koszyk->dodajTowar($towar1);
    $this->koszyk->dodajTowar($towar1);
    $this->koszyk->usunTowar($towar1);

    $result = $this->koszyk->liczTowatyWKoszyku();
    $this->assertEquals(1,$result);
  }




}






 ?>
