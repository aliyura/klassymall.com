<?php require('php/init.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Klasy Mall [Checkout]</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="images/ico.png"/>
<link rel="stylesheet" type="text/css" href="plugins/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link href="plugins/labeauty/custom-tick.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="plugins/icons/simple-line-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jalert/jAlert.css">
<link rel="stylesheet" type="text/css" href="styles/_checkout.css">
<link rel="stylesheet" type="text/css" href="styles/main.css">
<link rel="stylesheet" type="text/css" href="styles/sub-pages.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>
<form action="" method="post">
<div class="super_container">
	<!-- Header -->
<section class="header-top">
    <?php require('php/header.php');?>
    </section>
        <!-- Banner -->
    <div class="cart_section">
     <div class="container">
      <div class="row">
       <div class="col-lg-12 shopping-cart-wrapper">
         <div class="cart_container">
          <div class="container wow fadeIn">
            <div class="row">
            <div class="col-md-8 mb-4  checkout-form" name="checkoutPanel">   <!-- Checkou Form --> 
                <div class="loader loader--style2 activityLoader" title="1">
                  <svg version="1.1" id="loader-1"  x="0px" y="0px"
                     width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                  <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                    <animateTransform attributeType="xml"
                      attributeName="transform"
                      type="rotate"
                      from="0 25 25"
                      to="360 25 25"
                      dur="0.6s"
                      repeatCount="indefinite"/>
                    </path>
                  </svg>
                </div>
        </div>
        <div class="col-md-4 mb-4 dueDescription-wrp">
               <section class="cartItems-description-wrp">
                <div class="states-thrd">
                   <div class="card order-description plus_nine">
                       <h2 align="center">Description</h2>
                    </div>      
                    <section class="checkout-description" name="checkoutDescriptionPanel">
                         <div class="item_display_container plus_nine">
                           No Items in your Cart
                        </div>
                    </section>
               </div>  
         </section>       
         <div class="row" style="margin-bottom:1em;">
               <div class="col-md-12 col-xs-12" style="margin:0; padding:0">
                    <div class="address-accuracy">  
                    <h3>Address Accuracy</h3>  
                    <p>Make sure you get your stuff! If the address is not entered correctly, your package may be returned as undeliverable. You would then have to place a new order. Save time and avoid frustration by entering the address information in the appropriate boxes and double-checking for typos and other errors. Need help? Click for address tips:</p> 
                   </div> 
               </div>
            </div>
            <!-- Cart -->
            <div class="make-order-controllers">
                <button class="btn btn-success" type="button" onclick="initiateOrder(this,'ONLINE');"> Pay Online</button>
                
                <button class="btn btn-primary " type="button" onclick="initiateOrder(this,'CASH');"> Cash on Delivery</button>
            </div> 
         </div>
    </div>
    <div class="clearfix"> </div>
     </div>
   </div>
  </div>
  </div>
</div>
</div>
    <!-- Recently Viewed -->
	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Top Products</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>
					<div class="viewed_slider_container">
						<div class="owl-carousel owl-theme viewed_slider" name="topProductsPanel">
                         <div class="loader loader--style2 activityLoader" title="1">
                           <svg version="1.1" id="loader-1"  x="0px" y="0px"
                              width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                           <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                             <animateTransform attributeType="xml"
                               attributeName="transform"
                               type="rotate"
                               from="0 25 25"
                               to="360 25 25"
                               dur="0.6s"
                               repeatCount="indefinite"/>
                             </path>
                           </svg>
                         </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Newsletter -->
<section class="footer-bottom">
<?php require('php/footer.php')?>    
</section>
</div>
</form>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="plugins/bootstrap4/popper.js"></script>
<script src="plugins/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/cart_custom.js"></script>
<script type="text/javascript" src="plugins/ayral/ayral.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert-functions.js"></script>
<script type="text/javascript" src="plugins/labeauty/custom-tick.js"></script>
<script type="text/javascript" src="js/config.js"></script>
<script type="text/javascript" src="js/ui/KM.checkout-form.js"></script>
<script type="text/javascript" src="js/ui/KM.checkout-description-ui.js"></script>
<script type="text/javascript" src="js/ui/KM.shipping-addresses.js"></script>
<script type="text/javascript" src="js/ui/KM.top-items-ui.js"></script>
<script type="text/javascript" src="js/order-module.js"></script>
</body>
</html>