<?php require('php/init.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Klasy Mall [Add Payment]</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="images/ico.png"/>
<link rel="stylesheet" type="text/css" href="plugins/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link href="plugins/labeauty/custom-tick.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="plugins/icons/simple-line-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jalert/jAlert.css">
<link rel="stylesheet" type="text/css" href="styles/_add-payment.css">
<link rel="stylesheet" type="text/css" href="styles/main.css">
<link rel="stylesheet" type="text/css" href="styles/sub-pages.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>
<form action="" method="post">
<div class="super_container">
<section class="header-top">
    <?php require('php/header.php');?>
    </section>
    <div class="cart_section">
     <div class="container">
      <div class="row">
       <div class="col-lg-12 shopping-cart-wrapper">
         <div class="cart_container">
          <div class="container wow fadeIn">
            <div class="row">
            <div class="col-md-8 mb-4  checkout-form">   <!-- Checkou Form --> 
              <section class="orderDetails-body">
                <?php
                  
                    if(isset($_GET['status'])){
                        $status=($_GET['status']); 
                
                        if($status=='1'){
                            if(isset($_GET['trans']) and isset($_GET['ref'])){
                                
                                $trans=($_GET['trans']); 
                                $ref=($_GET['ref']);
                                $uid=$_SESSION['token'];
                              
                              echo('
                                 <div class="card order-description" style="margin-left:0;">
                                     <h2 align="center"><span class="badge success">Wow</span> Payment Successful</h2>
                                 </div>  

                                  <div class="card payment-status-desc" style="margin-left:0;">
                                       <p>Order No.: <b>'.$ref.'</b></p> 
                                       <p>Transection ID: <b>'.$trans.'</b></p>
                                       <p align="left">Your order has been completed, we will call you to plan the delivery of the item. Thank you.</p>
                                  </div>  
                              ');  
                                
                            }else{
                                  echo('
                                   <div class="card order-description" style="margin-left:0;">
                                       <h2 align="center">Payment Status</h2>
                                   </div>  

                                    <div class="card payment-status-desc" style="margin-left:0;">
                                         <p align="left">Unknown</p>
                                    </div>  
                                ');
                            }
                        }
                        else if($status=='2'){
                            
                            if(isset($_GET['trans']) and isset($_GET['ref'])){

                                $trans=($_GET['trans']); 
                                $ref=($_GET['ref']);
                                echo('
                                   <div class="card order-description" style="margin-left:0;">
                                       <h2 align="center"><span class="badge danger">Oops</span> Payment Failed</h2>
                                   </div>  

                                    <div class="card payment-status-desc" style="margin-left:0;">
                                         <p>Transection ID: <b>'.$trans.'</b></p>
                                         <p align="left">We are unable to take your payment, please try to take it again or contact our customer care to support you quickly. Thanks. </p>
                                    </div>  
                                ');
                            }else{
                                echo('
                                   <div class="card order-description" style="margin-left:0;">
                                       <h2 align="center">Payment Status</h2>
                                   </div>  

                                    <div class="card payment-status-desc" style="margin-left:0;">
                                         <p align="left">Unknown</p>
                                    </div>  
                                ');
                            }
                            
                        }
                        else{
                           echo('
                              <div class="card order-description" style="margin-left:0;">
                                  <h2 align="center"> <span class="badge danger">Oops</span> Payment Canceled</h2> 
                              </div> 
                              <div class="card payment-status-desc" style="margin-left:0;">
                                         <p align="left">It seems like you canceled the payment, please let us know if you have any challenges in taking the payment. Thank you.</p>
                                    </div> 
                            ');  
                        }
                    }else{
                       echo('<script>window.location.href="checkout"</script>');
                    }
                  
                  ?>
              
                  
                
        </section>
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
<script src="js/voguePay.js"></script>
<script type="text/javascript" src="plugins/ayral/ayral.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert-functions.js"></script>
<script type="text/javascript" src="plugins/labeauty/custom-tick.js"></script>
<script type="text/javascript" src="js/config.js"></script>
<script type="text/javascript" src="js/ui/KM.payment-description.js"></script>
<script type="text/javascript" src="js/ui/KM.top-items-ui.js"></script>
</body>
</html>