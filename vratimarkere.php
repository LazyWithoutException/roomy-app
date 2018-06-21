<?php
require_once('classes/lib.php');
require_once('includes/config.php');
include_once 'classes/password.php';

$baza=new DB();

if(isset($_GET["marker"]))
{
    $json=json_encode($baza->vratiSveMarkere(),true);
    echo $json;
}

?>