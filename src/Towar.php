<?php

class Towar
{
  private $id;
  private $towarNazwa;
  private $towarVat;
  private $towarCena;

/*

  public function __construct($id,$nazwa,$vat,$cena)
  {
    $this-ustawId($id);
    $this->ustawNazwa($nazwa);
    $this->ustawCena($cena);
    $this->ustawVat($vat);
  }

*/


  public function pobierzId()
  {
    return $this->id;
  }
  public function pobierzNazwa()
  {
    return $this->towarNazwa;
  }
  public function pobierzCena()
  {
    return $this->towarCena;
  }
  public function pobierzVat()
  {
    return $this->towarVat;
  }

  public function ustawId($id)
  {
    if($id>0)
    {
      $this->id=$id;
      return true;
    }
      return false;

  }
  public function ustawNazwa($nazwa)
  {
    $this->towarNazwa=$nazwa;
  }
  public function ustawCena($cena)
  {
    if($cena>0)
    {
      $this->towarCena=$cena;
      return true;
    }
      return false;

  }
  public function ustawVat($vat)
  {
    if($vat>0)
    {
      $this->towarVat=$vat;
      return true;
    }
      return false;

  }


}


 ?>
