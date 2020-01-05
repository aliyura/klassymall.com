<!DOCTYPE html>
<html lang="en">
<head>
<title>Klasy Mall [Activate your Account]</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
          <?php  require('php/sign-header.php');?>
        </section>    
    <div class="sign_container">
        <div class="sign-wrp">
            <header class="sign-header">
                <h2>Activate your Account</h2>
            </header>
            <section class="in-wrp">
                <section class="registration-fields" >
                    <p class="info">We have sent Activation code to you via the mobile number you provided. Please use the code below to activate your Account.</p>
                     <input type="text"  name="a-username" id="a-username" class="abs-in input_field"  maxlength="30" placeholder="e.g Rabiu_Aliyu_009">
                    <input type="tel" class="input_field" placeholder="Activation Code e.g 000000" name="a-code" id="a-code" maxlength="6"  autocomplete="none">
                    <div class="alert alert-warning warnningAlert signupAlert" state="inactive" role="alert">
                     This is a warning alert—check it out!
                    </div>
                    <div class="button-in">
                       <button type="button" class="button" name="activation-trigger">Activate</button>
                    </div> 
                    <div class="in link-section">
                        <label>Not receive code yet? <a href="Javascript:return false;" onclick="resendResetKey(this)" class="link">Resend Now</a></label>
                    </div>
                </section>
            </section>
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