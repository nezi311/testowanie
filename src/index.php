<?php
require_once("E:/xampp/htdocs/Dominiak_Dawid_testowanieOprogramowania/src/Towar.php");
require_once("E:/xampp/htdocs/Dominiak_Dawid_testowanieOprogramowania/src/KoszykSklepowy.php");


$koszyk = new KoszykSklepowy();

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
$koszyk->dodajTowar($pendrive);
$koszyk->dodajTowar($pendrive2);
$koszyk->usunTowar($pendrive);
echo $result = $koszyk->liczTowatyWKoszyku();

?>
