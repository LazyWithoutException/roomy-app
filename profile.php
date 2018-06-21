<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
$title = 'Roomy Profil';

$u=$_SESSION['username'];

if(isset($_POST["submitEditProfile"])){
    echo "Podaci uspesno snimljeni.";
    //hash the password
    $hashPass = $user->password_hash($_POST['editPassword'], PASSWORD_BCRYPT);
    $username = $_POST['editUsername'];
    $email = $_POST['editEmail'];
    $pass = $_POST['editPassword'];
    $passCon = $_POST['editPasswordConfirm'];

    if($_POST['editPassword'] != $_POST['editPasswordConfirm'])
    {
        echo "AAAAAAAAAAA";
    }
    

    //create the activasion code
    $activasion = md5(uniqid(rand(),true));
    // !!!!!!!!!!!!!!!! active =>$activasion u slucaju da imamo aktivaciju mejla
    try {
        
        //insert into database with a prepared statement
        $stmt = $db->prepare("UPDATE members SET username='$username',password='$hashPass',email='$email' WHERE username='$u'");
        $stmt->execute();
        $id = $db->lastInsertId('memberID');
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        $_SESSION['email']=$email;


        //redirect to index page
        header('Location: profile.php');
        exit;

    //else catch the exception and show the error.
    } catch(PDOException $e) {
        $error[] = $e->getMessage();
    }

}

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
                <li >
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
                <li class="active">
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
                        
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                       
                       
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                            <form action="profile.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="editUsername" class="form-control" placeholder="Username" value="<?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="editEmail" class="form-control" placeholder="Email" value="<?php echo htmlspecialchars($_SESSION['email'], ENT_QUOTES); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="editPassword" class="form-control" placeholder="password">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Confirm password</label>
                                                <input type="password" name="editPasswordConfirm" class="form-control" placeholder="re-enter password">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" name="submitEditProfile" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
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
    <script src="javascript/ajax.js"></script>

	
</html>