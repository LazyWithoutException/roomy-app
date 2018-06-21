<?php require('includes/config.php'); 
<<<<<<< HEAD
=======
require_once('classes/lib.php');
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
   //if not logged in redirect to login page
   if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }
   
   //define page title
   $title = 'Roomy Oglasi';
   
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
      <link rel="stylesheet" type="text/css" href="./style/main.css">
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
                  <li >
                     <a href="memberpage.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>Glavna mapa</p>
                     </a>
                  </li>
                  <li class="active">
                     <a href="post-ads.php">
                        <i class="pe-7s-bell"></i>
                        <p>Postavi oglas</p>
                     </a>
                  </li>
                  <li >
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
                  </div>
               </div>
            </nav>
            <div class="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="header">
                              <h4 class="title">Postavi oglas</h4>
                           </div>
                           <div class="content">
                              <div class="row">
                                 <div class="col-md-6">
                                    <ul class="pagination">
                                       <li id="btnStan" >
                                          <a class="page-link" href="#">Stan</span></a>
                                       </li>
                                       <li id="btnCimer">
                                          <a class="page-link" href="#">Cimer<span class="sr-only"></a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div id="cimer" class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Hobi</label>
                                       <textarea id="hobi" rows="3" class="form-control" placeholder="Navedite svoje hobije " value="" class="form-check-input"> </textarea>
<<<<<<< HEAD
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Osobine</label>
                                       <textarea id="osobine" rows="3" class="form-control" placeholder="Navedite vase osobine" value=""> </textarea>
                                    </div>
                                 </div>
                              </div>
                              <div  id="cimerr" class="row">
                                 <div class="col-md-2">
                                    <div class="form-group">
                                       <label for="exampleFormControlSelect1">Pol</label>
                                       <select class="form-control" id="pol">
                                          <option value="muski">Muski</option>
                                          <option value="zenski">Zenski</option>
                                          <option valu="drugi">Drugo</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                       <label for="exampleFormControlSelect1">Da li ste zaposleni </label>
                                       <select class="form-control" id="zaposlenost">
                                          <option value="da">Da</option>
                                          <option value="ne">Ne</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                       <label>Godine</label>
                                       <input  id="godine" type="number" class="form-control" placeholder="18" min="0">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="exampleFormControlSelect1">Tip objekta </label>
                                       <select class="form-control" id="tip-objekta">
                                          <option value="stan">Stan</option>
                                          <option value="kuca">Kuca</option>
                                          <option valu="dupleks">Dupleks</option>
                                          <option valu="garsonjera">Garsonjera</option>
                                          <option valu="drugo">Drugo</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Kvadratura</label>
                                       <input  id="kvadratura" type="number" class="form-control" placeholder="100" min="0">
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Cena (u evrima)</label>
                                       <input id="cena" type="text" class="form-control" placeholder="100" min="0">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleFormControlSelect1">Da li je  stan namesten </label>
                                       <select class="form-control" id="namestenost">
                                          <option>Da</option>
                                          <option>Ne</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleFormControlSelect1">Grejanje </label>
                                       <select class="form-control" id="grejanje">
                                          <option>Da</option>
                                          <option>Ne</option>
=======
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Osobine</label>
                                       <textarea id="osobine" rows="3" class="form-control" placeholder="Navedite vase osobine" value=""> </textarea>
                                    </div>
                                 </div>
                              </div>
                              <div  id="cimerr" class="row">
                                 <div class="col-md-2">
                                    <div class="form-group">
                                       <label for="exampleFormControlSelect1">Pol</label>
                                       <select class="form-control" id="pol">
                                          <option value="muski">Muski</option>
                                          <option value="zenski">Zenski</option>
                                          <option valu="drugi">Drugo</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                       <label for="exampleFormControlSelect1">Da li ste zaposleni </label>
                                       <select class="form-control" id="zaposlenost">
                                          <option value="da">Da</option>
                                          <option value="ne">Ne</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                       <label>Godine</label>
                                       <input  id="godine" type="number" class="form-control" placeholder="18" min="0">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="exampleFormControlSelect1">Tip objekta </label>
                                       <select class="form-control" id="tip-objekta">
                                          <option value="stan">Stan</option>
                                          <option value="kuca">Kuca</option>
                                          <option valu="dupleks">Dupleks</option>
                                          <option valu="garsonjera">Garsonjera</option>
                                          <option valu="drugo">Drugo</option>
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
<<<<<<< HEAD
                                       <label for="exampleFormControlSelect1">Pomocne zgrade </label>
                                       <select class="form-control" id="pomocne-zgrade">
                                          <option>Da</option>
                                          <option>Ne</option>
                                       </select>
=======
                                       <label>Kvadratura</label>
                                       <input  id="kvadratura" type="number" class="form-control" placeholder="100" min="0">
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
<<<<<<< HEAD
=======
                                       <label>Cena (u evrima)</label>
                                       <input id="cena" type="text" class="form-control" placeholder="100" min="0">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleFormControlSelect1">Da li je  stan namesten </label>
                                       <select class="form-control" id="namestenost">
                                          <option>Da</option>
                                          <option>Ne</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleFormControlSelect1">Grejanje </label>
                                       <select class="form-control" id="grejanje">
                                          <option>Da</option>
                                          <option>Ne</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleFormControlSelect1">Pomocne zgrade </label>
                                       <select class="form-control" id="pomocne-zgrade">
                                          <option>Da</option>
                                          <option>Ne</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
                                       <label for="exampleFormControlSelect1">Da li je  stan uknjizen </label>
                                       <select class="form-control" id="uknjizenost">
                                          <option>Da</option>
                                          <option>Ne</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Telefon</label>
                                       <input id="telefon" type="text" class="form-control" placeholder="1111 1111" value="">
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Broj soba</label>
                                       <input id="broj-soba"type="number" class="form-control" placeholder="1 " min="0">
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Sprat</label>
                                       <input id="sprat" type="number" class="form-control" placeholder="1" min="0">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Adresa</label>
                                       <input id="adresa" type="text" class="form-control" placeholder="Adresa" value="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Dodatan opis</label>
                                       <textarea id="opis" rows="5" class="form-control" placeholder="Opistie detaljnije " value=""> </textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div id="mappost" ></div>
                                 </div>
                              </div>
                              <div class="row">
<<<<<<< HEAD
                                 <form class="form-group" action="fajlovi.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="image"/> <br/>
                                    <input   type="submit" name="sumit" value="Upload"/>
                                    </br>
                                 </form>
=======
                                 
                                 <?php echo htmlspecialchars(DB::prikaziSlike(),ENT_QUOTES);?>
                                    <input  type="file" multiple onchange="processSelectedFiles(this)"/> <br/>
                                   
                              
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
                              </div>
                              <button id="btnSubmit"   class="btn btn-info btn-fill pull-right">Prosledi oglas</button>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <footer class="footer">
            <div class="container-fluid">
               <nav class="pull-left">
                  <ul>
                     <li>
                        <a href="#">
                        Home
                        </a>
                     </li>
                  </ul>
               </nav>
               <p class="copyright pull-right">
                  &copy; <script>document.write(new Date().getFullYear())</script> Lazy Without Exception </a>
               </p>
            </div>
         </footer>
      </div>
      </div>
   </body>
   <script src="javascript/main.js"></script>
   <script src="javascript/mappost.js"></script>
   <script src="javascript/map_styles.js"></script>
   <script src="javascript/post-manager.js"></script>
<<<<<<< HEAD
=======

>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
  
   
   <script src="assets/js/chartist.min.js"></script>
   <!--   Core JS Files   -->
   <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
   <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
   <!--  Charts Plugin -->
   <script src="assets/js/chartist.min.js"></script>
   <!--  Notifications Plugin    -->
   <script src="assets/js/bootstrap-notify.js"></script>
   <!--  Google Maps Plugin    -->
   <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
   <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
   <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
   <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEkh7spdIHPnxUHSjqk5Y4WTrS8fEiez8&callback=initMap"></script>	
</html>