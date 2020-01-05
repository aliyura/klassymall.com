<!DOCTYPE html>
<html lang="en">
<head>
<title>Klasy Mall [Regsiter New Account]</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Register withKlassy Mall, Klassy Mall Online, Buy Items in Nigeria, Buy Shoes in Nigeria, Shoes in Nigeria, Shopping Store in Nigeria,Online Shopping in Nigeria"/>
<meta name="description" content="Create your New Account with Klassy Mall Today">
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
<style>
 .sign_container .sign-wrp{
        width: 60%;
        margin: auto;
 }

 @media(max-width:600px){
   .sign_container .sign-wrp{
         width: 90%;
         margin: auto;
        margin-left: 10px;
   }
    .sign_container  .group-in-3d *{
         width: 90%;
         margin-bottom: 10px;
    }
    .sign_container .button{
        margin-top: none;
        margin-bottom: 1em;
        
    }
 }
</style>
</head>
<body>
<form action="" method="post">
<div class="super_container">
    <section class="header-top">
      <?php require('php/sign-header.php');?>
    </section>    
<div class="sign_container">
		<div class="container sign-wrp">
			 <header class="sign-header">
               <h2>Register <span class="more">your Account</span></h2>
             </header>
            <section class="registration-fields">
				<h6>Profile information</h6>
				   <input type="text" class="input_field" alt="user" placeholder="Name" name="p-name">
                    <div actas="2d-layout">
                    <div actas="layout" class="autocomplete">
                        <input type="tel" class="input_field" autocomplete="off"  name="p-number" id="p-number" placeholder="Mobile Number" maxlength="11">
                    </div>
                     <div  actas="layout" class="autocomplete">
                         <input type="text"  class="input_field" placeholder="Email Address"  name="p-email" id="p-email">
                     </div>
                    </div>
                   <div actas="2d-layout">
                    <div actas="layout" class="autocomplete">
                        <input type="text"  class="capitalize city-input input_field" autocomplete="off"  name="p-location" id="p-location" placeholder="Add your City" alt="location-pin">
                    </div>
                     <div  actas="layout" class="autocomplete">
                         <input type="text"  class="capitalize area-input input_field" placeholder="Select your Area" autocomplete="off"  name="p-area" id="p-area" alt="location-pin">
                     </div>
                    </div>
                    <div actas="2d-layout">
                        <div  actas="layout">
                         <h6>Select Gender </h6>
                         <select class="input_field" name="p-gender" alt="user-female">
                             <option selected>Male</option>
                             <option>Female</option>
                         </select>
                        </div>
                         <div  actas="layout">
                             <h6>Date of Birth</h6>
                             <input type="date" class="input_field" name="p-dob"  min="1970-01-01" max="2019-02-01" alt="clock" placeholder="01/01/2099">
                        </div>
                     <textarea  class="text_field" wrap="" placeholder="Home/Office Address" name="p-address"></textarea>
                    </div>
				   <h6>Login information</h6>
                    <div actas="2d-layout">
                        <div actas="layout">
				           <input type="text" name="p-new_username" class="abs-in input_field" alt="user"  maxlength="30" placeholder="e.g Rabiu_Aliyu_009">
                        </div>
                         <div actas="layout">
                            <input type="password" autocomplete="off" alt="lock" placeholder="New Password Min(6)" maxlength="12" name="p-password" class="abs-in input_field">
                        </div>
                   </div>
                    
                 <input type="password" autocomplete="off" alt="lock" placeholder="Confirm Password" maxlength="12" name="p-confirm" class="abs-in input_field">
                 <div actas="wrapper" class="check signupCheck-wrp">
                      <input type="checkbox" name="p-terms"  data-labelauty="Accept Terms"/>
                 </div>
                 <div class="alert alert-warning warnningAlert signupAlert" state="inactive" role="alert">
                     This is a warning alert—check it out!
                 </div>
                 <div class="button-in" style="text-align:right">
                     <button type="button" shape="circle" class="btn success sigb-btn" name="signup-trigger">Continue</button>
                </div> 
            </section>
			 </div>
			<div class="register-home">
                <h4 style="margin-bottom:2em;">Already Registered?</h4>
				<p><a href="login">Login Now</a> (Or) go back to <a href="https://klassymall.com/">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
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