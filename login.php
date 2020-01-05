<?php
  session_start();
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Klasy Mall  [Login to your Account]</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Login to Klassy Mall, Klassy Mall Online, Buy Items in Nigeria, Buy Shoes in Nigeria, Shoes in Nigeria, Shopping Store in Nigeria,Online Shopping in Nigeria"/>
<meta name="description" content="Login to Your Klassy Mall Account">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="images/ico.png"/>
<link rel="stylesheet" type="text/css" href="plugins/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/icons/simple-line-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jalert/jAlert.css">
<link href="plugins/jalert/jAlert.css" rel="stylesheet" type="text/css" media="all" />
<link href="plugins/labeauty/custom-tick.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="styles/main.css">
<link rel="stylesheet" type="text/css" href="styles/_sign.css">
</head>
<body>
<form action="" method="post">
<div class="super_container">
    <section class="header-top">
      <?php require('php/sign-header.php');?>
    </section>    
<div class="sign_container">
	<div class="sign-wrp">
        <header class="sign-header">
            <h2>Login <span class="more">to your Account</span></h2>
        </header>
        <section class="in-wrp">
            <section class="registration-fields">
                <div class="in">
                   <input type="text" name="username" id="username" class="abs-in input_field" alt="user"  maxlength="30" placeholder="Username or Mobile Number" >
                </div>
                <div class="in">
                    <input type="password" autocomplete="off" placeholder="Password" maxlength="12" name="password" id="password" class="abs-in input_field">
                </div>
                  <div actas="wrapper"  class="check signupCheck-wrp">
                        <input type="checkbox" name="terms"  data-labelauty="Keep me in"/>
                   </div>
                 <div class="alert alert-warning warnningAlert" state="inactive" role="alert">
                     This is a warning alert—check it out!
                 </div>
                <div class="in button-in">
                  <button type="button" class="button" name="login-trigger">Login</button>
                </div> 
                <div class="in link-section">
                    <label>Don't have an Account, <a href="register" class="link">Register here</a></label>
                </div>
            </section>
        </section>
	</div>
    <div class="register-home">
        <h4 style="margin-bottom:2em;">Forgort your Password ?</h4>
		<p><a href="forgort-password">Recover Now</a> (Or) go back to <a href="https://klassymall.com/">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
     </div>
</div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="plugins/bootstrap4/popper.js"></script>
<script src="plugins/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script type="text/javascript" src="plugins/ayral/ayral.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert-functions.js"></script>
<script type="text/javascript" src="plugins/labeauty/custom-tick.js"></script>
<script type="text/javascript" src="js/config.js"></script>
<script type="text/javascript" src="js/autocomplete.js"></script>
<script type="text/javascript" src="js/location-module.js"></script>
<script type="text/javascript" src="js/sign-module.js"></script>
</form>
</body>
</html>