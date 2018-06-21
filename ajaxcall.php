<?php
require_once('classes/lib.php');
require_once('includes/config.php');
include_once 'classes/password.php';
ini_set('mysql.connect_timeout',300);
ini_set('default_socket_timeout',300);


$tip=(string)$_GET["tip"];
$kvadratura=intval($_GET["kvadratura"]);
$cena=intval($_GET["cena"]);
$namestenost=(string)$_GET["namestenost"];
$grejanje=(string)$_GET["grejanje"];
$pomocne_strukture=(string)$_GET["pomocne_zgrade"];
$uknjizenost=(string)$_GET["uknjizenost"];
$telefon=(string)$_GET["telefon"];
$sobe=intval($_GET["sobe"]);
$sprat=intval($_GET["sprat"]);
$latituda=(string)$_GET["lat"];
$langituda=(string)$_GET["lng"];
$opis=(string)$_GET["opis"];
$lokacija=(string)$_GET["adresa"];
$memberId=intval($_SESSION['memberID']);


$baza=new DB();
//var_dump($baza->prikaziSlike());

if($_GET["tip_oglasa"]=="true")
{
    $stan=new oglasZaStan(null,$langituda,$latituda,"stan",$namestenost,$tip,$grejanje,$pomocne_strukture,$cena,$kvadratura,$sobe,$sprat,$lokacija,$telefon,$opis,$uknjizenost,date("d-m-Y"),$memberId);
    $baza->dodajOglasZaStan($stan);


}
else
{
    $hobi=(string)$_GET["hobi"];
    $osobine=(string)$_GET["osobine"];
    $pol=(string)$_GET["pol"];
    $zaposlen=(string)$_GET["zaposlen"];
    $godine=intval($_GET["godine"]);

    $cimer=new oglasZaCimera(null,$langituda,$latituda,"cimer",$namestenost,$tip,$grejanje,$pomocne_strukture,$cena,$kvadratura,$sobe,$sprat,$lokacija,$telefon,$opis,$uknjizenost,date("d-m-Y"),$memberId,null,$pol,$godine,$osobine,$hobi,$zaposlen,null);
    $baza->dodajOglasZaCimera($cimer);
}

?>