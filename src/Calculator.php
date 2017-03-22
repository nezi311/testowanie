<?php
class Calculator
{
  public function add($a, $b)
  {
    return $a + $b;
  }

  public function div($a, $b)
  {
    try
    {
        return $a / $b;
    }
    catch(Exception $e)
    {
      print_r("Dzielenie przez 0");
    }

  }

}

 ?>
