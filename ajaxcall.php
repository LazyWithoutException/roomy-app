<?php
require_once('classes/lib.php');
require_once('includes/config.php');
include_once 'classes/password.php';


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
$latituda=intval($_GET["lat"]);
$langituda=intval($_GET["lng"]);
$opis=(string)$_GET["opis"];
$lokacija=(string)$_GET["adresa"];
$memberId=intval($_SESSION['memberID']);

echo $tip;

$baza=new DB();
$stan=new oglasZaStan(null,$langituda,$latituda,$namestenost,$tip,$grejanje,$pomocne_strukture,$cena,$kvadratura,$sobe,$sprat,$lokacija,$telefon,$opis,$uknjizenost,"a",$memberId);
$baza->dodajOglasZaStan($stan);
?>