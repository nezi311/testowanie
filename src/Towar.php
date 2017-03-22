<?php

class Towar
{
  private $id;
  private $towarNazwa;
  private $towarVat;
  private $towarCena;


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
    $this->id=$id;
  }
  public function ustawNazwa($nazwa)
  {
    $this->towarNazwa=$nazwa;
  }
  public function ustawCena($cena)
  {
    $this->towarCena=$cena;
  }
  public function ustawVat($vat)
  {
    $this->towarVat=$vat;
  }


}


 ?>
