<?php

class KoszykSklepowy implements Iterator, Countable
{
  // potrzebny do implementacji "countable"


  // potrzebna do implementacji metod iteratora
  private $pozycja=0;


  private $towary=array();
  private $ids=array();

public function count()
{
  return count($this->towary);
}

public function czyPusty()
{
  if ($this->count()==0)
    return true;
  else
    return false;
}

public function dodajTowar($towar)
{
  $towary[]=('Towar'=>$towar, 'Ilosc'=>1);
}

public function liczTowatyWKoszyku()
{
  return $this->count();
}

}


 ?>
