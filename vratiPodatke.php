<?php
require_once('classes/lib.php');
require_once('includes/config.php');
include_once 'classes/password.php';

<<<<<<< HEAD


if(isset($_GET["tip"])){
    $stan=$_GET["id"];
=======
if(isset($_GET["tip"])){
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
    if($_GET["tip"] == "stan"){
        echo $json=json_encode(DB::vratiOglasZaStan($stan));
    }
    else{
        echo $json=json_encode(DB::vratiOglasZaCimeraStan_id($stan));
    }
}

if(isset($_GET["atribut"])){
    if($_GET["atribut"] == "stan"){
        $json=json_encode(DB::vratiSveStanove(),true);
        echo $json;
    }
    else{
        $json=json_encode(DB::vratiSveCimere(),true);
        echo $json;
    }
}

?>