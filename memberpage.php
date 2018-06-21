<?php require('includes/config.php'); 
   require_once('classes/lib.php');
   
   //if not logged in redirect to login page
   //if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }
   
   //define page title
   $title = 'Roomy Glavna';
   
   
   //include header template
   require('layout/header.php'); 
   ?>
</div>
<?php 
   //include header template
   require('layout/footer.php'); 
   ?>
<!doctype html>
<html lang="en">
   <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
      <meta charset="utf-8" />
      <link rel="icon" type="image/png" href="assets/img/favicon.ico">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="viewport" content="width=device-width" />
     
      <link href="style/memberpage.css" rel="stylesheet" />
      <!-- Bootstrap core CSS     -->
      <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
      <!-- Animation library for notifications   -->
      <link href="assets/css/animate.min.css" rel="stylesheet"/>
      <!--  Light Bootstrap Table core CSS    -->
      <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
      <!--  CSS for Demo Purpose, don't include it in your project     -->
      <link href="assets/css/demo.css" rel="stylesheet" />
      <!--     Fonts and icons     -->
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
      <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
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
                  <li class="active">
                     <a href="memberpage.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>Glavna mapa</p>
                     </a>
                  </li>
                  <li>
                     <a href="post-ads.php">
                        <i class="pe-7s-bell"></i>
                        <p>Postavi oglas</p>
                     </a>
                  </li>
                  <li>
                     <a href="list-ads.php">
                        <i class="pe-7s-note2"></i>
                        <p>Lista vasih oglasa</p>
                     </a>
                  </li>
                  <li>
                     <a href="profile.php">
                        <i class="pe-7s-user"></i>
                        <p>Korisnicki profil</p>
                     </a>
                  </li>
                  <li>
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
            <nav class="navbar navbar-default navbar-fixed" >
               <div class="container-fluid"  data-color="blue">
                  <div class="navbar-header" >
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                     <a class="navbar-brand" href="#">Dobro dosli korisnice <span style="color:#42f4dc"><?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?></span></a>
                  </div>
                  <div   class="collapse navbar-collapse">
                  </div>
               </div>
            </nav>
            <div id="mySidenav" class="sidenav">
               <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
               <img src="img/stan.jpg" style="position: relative;left: 0px;width: 450px;height: 306px;">
               <div class="card" style="width:100%;">
                  <ul class="list-group list-group-flush">
                     <li id="cena" class="list-group-item"> <label for="exampleFormControlSelect1">Cena: </label></li>
                     <li id="kvadratura" class="list-group-item"><label for="exampleFormControlSelect1">Kvadratura: </label></li>
                     <li id="brojsoba" class="list-group-item"><label for="exampleFormControlSelect1">Broj soba: </label></li>
                     <li id="grejanje" class="list-group-item"><label for="exampleFormControlSelect1">Grejanje: </label></li>
                     <li id="lokacija" class="list-group-item"><label for="exampleFormControlSelect1">Lokacija: </label></li>
                     <li id="sprat" class="list-group-item"><label for="exampleFormControlSelect1">Sprat: </label></li>
                     <li id="namestenost" class="list-group-item"><label for="exampleFormControlSelect1">Namestenost: </label></li>
                     <li id="uknjizenost"class="list-group-item"><label for="exampleFormControlSelect1">Uknjizenost: </label></li>
                     <li id="tipobjekta" class="list-group-item"><label for="exampleFormControlSelect1">Tip objekta: </label></li>
                     <li id="pomocnestrukture" class="list-group-item"><label for="exampleFormControlSelect1">Pomocne strukture: </label></li>
                     <li id="dodatno" class="list-group-item"><label for="exampleFormControlSelect1">Dodatno: </label></li>
                     <li id="telefon" class="list-group-item"><label for="exampleFormControlSelect1">Telefon: </label></li>

                     <li id="pol" class="list-group-item"><label for="exampleFormControlSelect1">Pol: </label></li>
                     <li id="raspongodina" class="list-group-item"><label for="exampleFormControlSelect1">Godine: </label></li>
                     <li id="osobine" class="list-group-item"><label for="exampleFormControlSelect1">Osobine: </label></li>
                     <li id="hobi" class="list-group-item"><label for="exampleFormControlSelect1">Hobi: </label></li>
                     <li id="radniodnos" class="list-group-item"><label for="exampleFormControlSelect1">Radni odnos: </label></li>
                  </ul>
                  <div class="card-body">
                     <a href="#" class="card-link">Another link</a>
                  </div>
               </div>
            </div>
            <div id="map" style="width:100%;height:100%;"></div>
         </div>
      </div>
      </div>
   </body>
   <!--   Core JS Files   -->
   <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
   <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
   <!--  Charts Plugin -->
   <script src="assets/js/chartist.min.js"></script>
   <!--  Notifications Plugin    -->
   <script src="assets/js/bootstrap-notify.js"></script>
   <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
   <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
   <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
   <script src="assets/js/demo.js"></script>
   <!--  Google Maps Plugin    -->

      <script src="javascript/main.js"></script>
      <script src="javascript/marker_manager.js"></script>
      <script src="javascript/map_styles.js"></script>
      <script src="javascript/side_window.js"></script>

    


            
   <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEkh7spdIHPnxUHSjqk5Y4WTrS8fEiez8&callback=initMap"></script>
</html>