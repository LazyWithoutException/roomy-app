<?php
require_once('classes/lib.php');
require_once('includes/config.php');
include_once 'classes/password.php';
ini_set('mysql.connect_timeout',300);
ini_set('default_socket_timeout',300);

if(isset($_POST['sumit']))
{
    if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
    {
        echo 'Please select image.';
    }
    else
    {
        $image=addslashes($_FILES['image']['tmp_name']);
        $name=addslashes($_FILES['image']['name']);
        $image=file_get_contents($image);
        $image=base64_encode($image);

        DB::dodajSliku($name,$image);
    }
    DB::prikaziSlike();
}

/*if(isset($_POST['submit']))
{
    if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
    {
        echo 'Please select image.';
    }
    else
    {
        $image=addslashes($_FILES['image']['tmp_name']);
        $name=addslashes($_FILES['image']['name']);
        $image=file_get_contents($image);

        DB::dodajSlikuZaKorisnika($image);
    }
}*/


?>