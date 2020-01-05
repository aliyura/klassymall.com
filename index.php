<?php require('php/init.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Wellcome to Klassy Mall, Expect much pay less </title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Klassy Mall, Klassy Mall Online, Buy Items in Nigeria, Buy Shoes in Nigeria, Shoes in Nigeria, Shopping Store in Nigeria,Online Shopping in Nigeria"/>
<meta name="description" content="Stay On Top Of Everything, Even When You Are Away. With Klassy Mall You Can Buy Your Favorite Products With Your Smartphone">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="images/ico.png"/>
<link rel="stylesheet" type="text/css" href="plugins/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="plugins/icons/simple-line-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jalert/jAlert.css">
<link rel="stylesheet" type="text/css" href="styles/_index.css">
<link rel="stylesheet" type="text/css" href="styles/_products.css">
<link rel="stylesheet" type="text/css" href="styles/main.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<style>
 @media only screen and (max-width: 800px){
         .banner_text{
             text-shadow: 0px 2px 2px rgb(44, 200, 110);
             font-weight: 500;
         }
         .banner_info{
             text-shadow: 0px 2px 2px rgb(202, 202, 202);
             font-weight: 500;
         }
  }
  @media only screen and (max-width: 500px){
        .shop_content {
            width: 112%;
            margin-left: -8px;
        }
         .banner_text{
             text-shadow: 0px 2px 2px rgb(44, 200, 110);
             font-weight: 500;
         }
  }
  @media only screen and (max-width: 400px){
        .shop_content {
            width: 112%;
            margin-left: -10px;
        }
  }
   @media only screen and (max-width: 320px){
        .shop_content {
            width: 112%;
            margin-left: -8px;
        }
  }
    
</style>
</head>
<body>
<div class="super_container">
	<!-- Header -->
    <section class="header-top">
      <?php require('php/header.php');?>
    </section>
	<!-- Banner -->

	<div class="banner">
		<div class="banner_background desktop-banner" style="background-image:url(images/banner1.jpg)"></div>
        <div class="banner_background mobile-banner" style="background-image:url(images/banner2.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
                        <h1 class="banner_text">Expect Much, Pay Less</h1>
                        <p class="banner_info">When You Are Shopping Accessories, Clothing, And Other Products Online, Finding The Best Deal Is Key. While Klassy Mall is A Useful.</p>
						<div class="button banner_button"><a href="products">Shop Now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Deals of the week -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

					<div class="deals">
						<div class="deals_title">Deals of the Week</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
								
								<!-- Deals Item -->
								<div class="owl-item deals_item">
									<div class="deals_image"><img src="images/deals.png" alt=""></div>
									<div class="deals_content">
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_category"><a href="#">Headphones</a></div>
											<div class="deals_item_price_a ml-auto">$300</div>
										</div>
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_name">Beoplay H7</div>
											<div class="deals_item_price ml-auto">$225</div>
										</div>
										<div class="available">
											<div class="available_line d-flex flex-row justify-content-start">
												<div class="available_title">Available: <span>6</span></div>
												<div class="sold_title ml-auto">Already sold: <span>28</span></div>
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
											<div class="deals_timer_title_container">
												<div class="deals_timer_title">Hurry Up</div>
												<div class="deals_timer_subtitle">Offer ends in:</div>
											</div>
											<div class="deals_timer_content ml-auto">
												<div class="deals_timer_box clearfix" data-target-time="">
													<div class="deals_timer_unit">
														<div id="deals_timer1_hr" class="deals_timer_hr"></div>
														<span>hours</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_min" class="deals_timer_min"></div>
														<span>mins</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_sec" class="deals_timer_sec"></div>
														<span>secs</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Deals Item -->
								<div class="owl-item deals_item">
									<div class="deals_image"><img src="images/deals.png" alt=""></div>
									<div class="deals_content">
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_category"><a href="#">Headphones</a></div>
											<div class="deals_item_price_a ml-auto">$300</div>
										</div>
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_name">Beoplay H7</div>
											<div class="deals_item_price ml-auto">$225</div>
										</div>
										<div class="available">
											<div class="available_line d-flex flex-row justify-content-start">
												<div class="available_title">Available: <span>6</span></div>
												<div class="sold_title ml-auto">Already sold: <span>28</span></div>
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
											<div class="deals_timer_title_container">
												<div class="deals_timer_title">Hurry Up</div>
												<div class="deals_timer_subtitle">Offer ends in:</div>
											</div>
											<div class="deals_timer_content ml-auto">
												<div class="deals_timer_box clearfix" data-target-time="">
													<div class="deals_timer_unit">
														<div id="deals_timer2_hr" class="deals_timer_hr"></div>
														<span>hours</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer2_min" class="deals_timer_min"></div>
														<span>mins</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer2_sec" class="deals_timer_sec"></div>
														<span>secs</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Deals Item -->
								<div class="owl-item deals_item">
									<div class="deals_image"><img src="images/deals.png" alt=""></div>
									<div class="deals_content">
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_category"><a href="#">Headphones</a></div>
											<div class="deals_item_price_a ml-auto">$300</div>
										</div>
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_name">Beoplay H7</div>
											<div class="deals_item_price ml-auto">$225</div>
										</div>
										<div class="available">
											<div class="available_line d-flex flex-row justify-content-start">
												<div class="available_title">Available: <span>6</span></div>
												<div class="sold_title ml-auto">Already sold: <span>28</span></div>
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
											<div class="deals_timer_title_container">
												<div class="deals_timer_title">Hurry Up</div>
												<div class="deals_timer_subtitle">Offer ends in:</div>
											</div>
											<div class="deals_timer_content ml-auto">
												<div class="deals_timer_box clearfix" data-target-time="">
													<div class="deals_timer_unit">
														<div id="deals_timer3_hr" class="deals_timer_hr"></div>
														<span>hours</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer3_min" class="deals_timer_min"></div>
														<span>mins</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer3_sec" class="deals_timer_sec"></div>
														<span>secs</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>
					
					<!-- Featured -->
                    
					<div class="featured" style="margin-top:-5em;">
                        <div class="featured-title">Top Categories</div>
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Hand Bags</li>
									<li>Ladies Shoes</li>
									<li>Ladies Wears</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>
							<!-- Product Panel -->
							<div class="product_panel panel shop_content active" name="firstTabPanel">
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
							<!-- Product Panel -->

							<div class="product_panel panel shop_content"  name="secondTabPanel">
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
							<!-- Product Panel -->

							<div class="product_panel panel shop_content"  name="thirdTabPanel">
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
							<!-- Product Panel -->
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>

	<div class="banner_2">
		<div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
		<div class="banner_2_container">
			<div class="banner_2_dots"></div>
			<!-- Banner 2 Slider -->

			<div class="owl-carousel owl-theme banner_2_slider">

				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="button banner_2_button"><a href="#">Explore</a></div>
									</div>
									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="images/banner_2_product.png" alt=""></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>

				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="button banner_2_button"><a href="#">Explore</a></div>
									</div>
									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="images/banner_2_product.png" alt=""></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>

				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="button banner_2_button"><a href="#">Explore</a></div>
									</div>
									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="images/banner_2_product.png" alt=""></div>
									</div>
								</div>
							</div>
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
					<div class="viewed_slider_container"  name="topProductsPanel">
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
<section class="footer-bottom">
<?php require('php/footer.php')?>    
</section>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="plugins/bootstrap4/popper.js"></script>
<script src="plugins/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/slick-1.8.0/slick.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
<script src="plugins/jalert/jAlert.js"></script>
<script src="plugins/jalert/jAlert-functions.js"></script>
<script type="text/javascript" src="plugins/ayral/ayral.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert-functions.js"></script>
<script type="text/javascript" src="plugins/labeauty/custom-tick.js"></script>
<script type="text/javascript" src="js/config.js"></script>
<script type="text/javascript" src="js/ui/KM.categorized-items-ui.js"></script>
<script type="text/javascript" src="js/ui/KM.top-items-ui.js"></script>
</body>
</html>