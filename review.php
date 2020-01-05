<?php require('php/init.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Klasy Mall [Order Preview]</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="images/ico.png"/>
<link rel="stylesheet" type="text/css" href="plugins/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/icons/simple-line-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jalert/jAlert.css">
<link rel="stylesheet" type="text/css" href="styles/main.css">
<link rel="stylesheet" type="text/css" href="styles/_contact.css">
<link rel="stylesheet" type="text/css" href="styles/_preview.css">
<link rel="stylesheet" type="text/css" href="styles/sub-pages.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>
<form action="" method="post">
<div class="super_container">
   <section class="header-top">
      <?php require('php/header.php');?>
    </section>
	<!-- Single Product -->
	<div class="single_product" name="previewPanel" id="previewPanel">
  <!--loader !-->
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

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="contact_form_container" name="contactFormPanel">
                      <!--loader !-->
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
		<div class="panel"></div>
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
							<!-- Recently Viewed Item -->
							  <!--loader !-->
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
	<!-- Brands -->
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
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/product_custom.js"></script>
<script src="plugins/jalert/jAlert.js"></script>
<script src="plugins/jalert/jAlert-functions.js"></script>
<script type="text/javascript" src="plugins/ayral/ayral.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert-functions.js"></script>
<script type="text/javascript" src="plugins/labeauty/custom-tick.js"></script>
<script type="text/javascript" src="js/config.js"></script>
<script type="text/javascript" src="js/ui/KM.contact-form-ui.js"></script>
<script type="text/javascript" src="js/ui/KM.order-review-ui.js"></script>
<script type="text/javascript" src="js/ui/KM.top-items-ui.js"></script>
<script type="text/javascript" src="js/messaging-module.js"></script>
</body>
</html>