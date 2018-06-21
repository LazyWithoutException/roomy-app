<?php
require_once('classes/lib.php');
require_once('includes/config.php');
include_once 'classes/password.php';
ini_set('mysql.connect_timeout',300);
ini_set('default_socket_timeout',300);

if(isset($_GET['sumit'])=="true")
{
    $filename=$_GET['nazivslike'];
}

/*if(isset($_POST['sumit']))
{
    if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
    {
        echo 'Please select image.';
    }
    else
    {
        $file=$_FILES['image'];
        $fileSize=$_FILES['image']['size'];
        $fileTmpName=$_FILES['image']['tmp_name'];
        $fileName=$_FILES['image']['name'];
        $fileExt=explode('.',$fileName);
        $fileActualExt=strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png','pdf');

        if(in_array($fileActualExt,$allowed))
        {
            if($fileSize<1000000){
                $fileNameNew=uniqid('',true).".".$fileActualExt;
                $fileDestination='img/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                header("Location: fajlovi.php?uploadsucces");
                DB::dodajSliku($fileDestination,$_SESSION['kljuc']);
            }
            else{
                echo 'Fajl je previse veliki!';
            }
        }
        else
        {
            echo "Nepodrzana ekstenzija fajla za uploadovanje!";
        }
    }
   
}*/


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