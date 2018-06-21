<?php require('includes/config.php'); 
   require_once('classes/lib.php');
   
   //if not logged in redirect to login page
   if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }
   
   //define page title
   $title = 'Roomy Lista';
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
      <meta charset="utf-8" />
      <link rel="icon" type="image/png" href="assets/img/favicon.ico">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="viewport" content="width=device-width" />
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
               <li>
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
               <li  class="active">
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
      <nav class="navbar navbar-default navbar-fixed">
         <div class="container-fluid"  data-color="blue">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">Dobro dosli korisnice <span style="color:#42f4dc"><?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?></span></a>
            </div>
            <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-left">
                  <li class="separator hidden-lg"></li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="header">
                     <h4 class="title">Oglasi za stan</h4>
                     <p class="category"></p>
                  </div>
                  <div class="content table-responsive table-full-width">
                     <table id="stanTabela" class="table table-hover table-striped">
                        <thead>
                           <th>Broj soba</th>
                           <th>Cena</th>
                           <th>Grejanje</th>
                           <th>Kvadratura</th>
                           <th>Lokacija</th>
                           <th>Pomocne strukture</th>
                           <th>Sprat</th>
                           <th>Telefon</th>
                           <th>Namestenost</th>
                           <th>Uknjizenost</th>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="header">
                        <h4 class="title">Oglasi za cimera</h4>
                        <p class="category"></p>
                     </div>
                     <div class="content table-responsive table-full-width">
                        <table id="cimerTabela" class="table table-hover table-striped">
                           <thead>
                              <th>pol</th>
                              <th>Osobine</th>
                              <th>Radni odnos</th>
                              <th>Raspon godina</th>
                              <th>Hobi</th>
                           </thead>
                           <tbody>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
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
   <!--  Google Maps Plugin    -->
   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
   <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
   <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
   <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
   <script src="assets/js/demo.js"></script>
   <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

       <script src="javascript/ajax.js"></script>
   <script src="javascript/table_manager.js"></script>
</html>