<?php

require_once("../src/Calculator.php");

$kalkulator = new Calculator();
$wynik = $kalkulator->add(5,10);
  if($wynik == 15)
  {
      print_r("Działa");
  }
  else
  {
      print_r("Nie działa");
  }

 ?>
