
<?php
require ('includes/config.php');
require_once ('classes/lib.php');
// if not logged in redirect to login page
// if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }
// define page title
$title = 'Roomy Glavna';
// include header template
require ('layout/header.php');
?>
</div>
<?php
// include header template
require ('layout/footer.php');
?>
<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="./style/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="style/memberpage.css" rel="stylesheet" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-2.jpg">
            <!--
               Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
               Tip 2: you can also add an image using data-image tag
               
               -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                  Roomy
                  </a>
                </div>
                <ul class="nav">
                    <li style="width:300px"class="active">
                        <a href="memberpage.php">
                            <i class="pe-7s-map-marker"></i>
                            <p >Glavna mapa </p>
                        </a>
                    </li>
                    <li style="width:300px">
                        <a href="post-ads.php">
                            <i class="pe-7s-bell"></i>
                            <p>Postavi oglas</p>
                        </a>
                    </li>
                    <li style="width:300px">
                        <a href="list-ads.php">
                            <i class="pe-7s-note2"></i>
                            <p>Lista vasih oglasa</p>
                        </a>
                    </li>
                    <li style="width:300px">
                        <a href="profile.php">
                            <i class="pe-7s-user"></i>
                            <p>Korisnicki profil</p>
                        </a>
                    </li>
                    <li style="width:300px">
                        <a href="logout.php">
                            <i class="pe-7s-back"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="#">
                            <i class="pe-7s-rocket"></i>
                            <p>Podrska</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
               <div class="container-fluid"  data-color="blue" style="height:60px;opacity:0.5;">
                  <div class="navbar-header" >
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                  </div>
                  <div class="collapse navbar-collapse">
                  </div>
               </div>
            </nav>
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">

                    </ol>
                    <div class="carousel-inner">

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="card" style="width:100%;">
                    <ul class="list-group list-group-flush">
                        <li id="cena" class="list-group-item"></li>
                        <li id="kvadratura" class="list-group-item">
                            <label for="exampleFormControlSelect1">Kvadratura: </label>
                        </li>
                        <li id="brojsoba" class="list-group-item">
                            <label for="exampleFormControlSelect1">Broj soba: </label>
                        </li>
                        <li id="grejanje" class="list-group-item">
                            <label for="exampleFormControlSelect1">Grejanje: </label>
                        </li>
                        <li id="lokacija" class="list-group-item">
                            <label for="exampleFormControlSelect1">Lokacija: </label>
                        </li>
                        <li id="sprat" class="list-group-item">
                            <label for="exampleFormControlSelect1">Sprat: </label>
                        </li>
                        <li id="namestenost" class="list-group-item">
                            <label for="exampleFormControlSelect1">Namestenost: </label>
                        </li>
                        <li id="uknjizenost" class="list-group-item">
                            <label for="exampleFormControlSelect1">Uknjizenost: </label>
                        </li>
                        <li id="tipobjekta" class="list-group-item">
                            <label for="exampleFormControlSelect1">Tip objekta: </label>
                        </li>
                        <li id="pomocnestrukture" class="list-group-item">
                            <label for="exampleFormControlSelect1">Pomocne strukture: </label>
                        </li>
                        <li id="dodatno" class="list-group-item">
                            <label for="exampleFormControlSelect1">Dodatno: </label>
                        </li>
                        <li id="telefon" class="list-group-item">
                            <label for="exampleFormControlSelect1">Telefon: </label>
                        </li>

                        <li id="pol" class="list-group-item">
                            <label for="exampleFormControlSelect1">Pol: </label>
                        </li>
                        <li id="raspongodina" class="list-group-item">
                            <label for="exampleFormControlSelect1">Godine: </label>
                        </li>
                        <li id="osobine" class="list-group-item">
                            <label for="exampleFormControlSelect1">Osobine: </label>
                        </li>
                        <li id="hobi" class="list-group-item">
                            <label for="exampleFormControlSelect1">Hobi: </label>
                        </li>
                        <li id="radniodnos" class="list-group-item">
                            <label for="exampleFormControlSelect1">Radni odnos: </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="map" style="width:100%;height:100%;"></div>
        </div>
    </div>
    </div>
</body>

<script src="assets/js/chartist.min.js"></script>
<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="javascript/main.js"></script>
<script src="javascript/marker_manager.js"></script>
<script src="javascript/map_styles.js"></script>
<script src="javascript/side_window.js"></script>
<script src="javascript/ajax.js"></script>





<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEkh7spdIHPnxUHSjqk5Y4WTrS8fEiez8&callback=initMap"></script>

</html>

  

 
 



