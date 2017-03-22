<?php
 require_once("E:/xampp/htdocs/testowanieOprogramowania/src/Towar.php");
class KoszykSklepowy implements Iterator, Countable
{

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
    if($this->czyPusty()>0)
    {
      $isInArray = false;
      foreach($this->towary as &$key)
      {
        if(in_array($towar, $key, true))
        {
          $isInArray=true;
          $key['Ilosc']++;
          return true;
        }
      }

      if(!$isInArray)
      {
        $this->towary[]=array('Towar'=>$towar, 'Ilosc'=>1);
        $this->id[]=array($towar->pobierzId());
        return true;
      }
    }
    else
    {
      $this->towary[]=array('Towar'=>$towar, 'Ilosc'=>1);
      $this->id[]=array($towar->pobierzId());
      return true;
    }

    return false;

  }

  public function usunTowar($towar)
  {
    if(!$this->czyPusty())
    {
      $i=0;
      foreach($this->towary as &$key)
      {
        if(in_array($towar, $key, true))
        {
          unset($this->towary[$i]);
        }
        $i++;
      }

      if(($key = array_search($towar, $this->ids)) !== false)
      {
        unset($this->ids[$key]);
        return true;
      }
    }

    return false;

  }

  public function usunTowary()
  {
    if(!$this->czyPusty())
    {
      $towary=array();
      $ids=array();
      //$this->towary=new array();
      return true;
    }
    return false;

  }

  public function aktualizujTowar($towar, $ilosc)
  {
    if(is_int($ilosc))
    {
      if($ilosc>=1)
      {
        foreach ($this->towary as &$key )
        {
          if($key['Towar']==$towar)
          {
            $key['ilosc']=$ilosc;
            return true;
          }
        }
      }
      else
      {
        print("Ilość nie może być mniejsza niż 1");
        return false;
      }
    }
    else
    {
      print("Ilość nie może być zmiennoprzecinkowa");
      return false;
    }

  }

  public function liczTowatyWKoszyku()
  {
    $ilosc=0;

    foreach($this->towary as $key)
    {
      $ilosc+=$key['Ilosc'];
    }
    return $ilosc;
  }

  public function key()
  {
    return $this->pozycja;
  }

  public function next()
  {
    ++$this->pozycja;
  }

  public function rewind()
  {
    $this->pozycja=0;
  }

  public function current()
  {
    return $this->towary[$this->pozycja];
  }

  public function valid()
  {
     return isset($this->towary[$this->pozycja]);
  }

  public function doZaplaty()
  {
    $cena=0;
    foreach ($this->towary as $key )
    {
      $cena+=($key['Towar']->pobierzCena())*$key['ilosc'];
    }

    return $cena;
  }

  public function cenaTowarowNaPozycji($pozycja)
  {
    $cena=0;
    $cena=($this->towary[$pozycja]['Towar']->pobierzCena())*$this->towary[$pozycja]['Ilosc'];

    return $cena;
  }

}


 ?>
