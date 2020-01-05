<?php 
$SESSION=0;
$uid='none';
$role='1';
session_start();
if(session_status() !== PHP_SESSION_NONE){
    if(isset($_SESSION['token'])){
     $uid=$_SESSION['token'];
     $role=$_SESSION['user-role'];
     $SESSION=1;
     print('
        <script>
            localStorage.setItem("session","'.$uid.'");
            localStorage.setItem("role","'.$role.'");
        </script>
     ');
    }
}else{
 $SESSION=0;
 $uid='none';
 $role='1';
  print('
    <script>
       localStorage.setItem("session","0");
       localStorage.setItem("role","0");
    </script>
  ');
}

$current=$_SERVER['PHP_SELF'];
$active='style="color: #25bb65; border-top:2px solid #25bb65; "';
$inActive='';
$homeActive='';$aboutActive='';
$productActive='';$contactActive='';$accountActive='';$manageMenuTemplate='';
if(preg_match('/index.php/',$current)){
    $homeActive=$active;
}
else if(preg_match('/about-us.php/',$current)){
    $aboutActive=$active;
}
else if(preg_match('/contact-us.php/',$current)){
    $contactActive=$active;
}
else if(preg_match('/profile.php/',$current)){
    $accountActive=$active;
}
else if(preg_match('/products.php/',$current)){
    $productActive=$active;
}else{
  $homeActive='';$aboutActive='';
  $productActive='';$contactActive='';$accountActive='';
}
    
$topDetails='';
if($SESSION==1){
    if($role==2){
        $topDetails='
          <div class="user_icon"><i class="fa fa-plus" style="font-size:12px;" alt=""></i></div>
          <div><a href="add-item">Add new Item</a></div>
          <div><a href="login">Signout</a></div>
        ';
        
        $manageMenuTemplate='
            <li><a href="contact-us" '.$contactActive.'>Contact<i class="fas fa-chevron-down"></i></a></li>
            <li class="hassubs">
                <a href="#" '.$accountActive.'>Manage Orders<i class="fas fa-chevron-down"></i></a>
                <ul>
                    <li><a href="orders">Orders<i class="fas fa-chevron-down"></i></a></li>
                    <li><a href="order-history">Order History<i class="fas fa-chevron-down"></i></a></li>
                </ul>
            </li>
        ';
    }else{
        $topDetails='
          <div class="user_icon"><i class="fa fa-user" style="font-size:12px;" alt=""></i></div>
          <div><a href="profile">My Profile</a></div>
          <div><a href="login">Signout</a></div>
        ';  
        
        $manageMenuTemplate='
         <li><a href="contact-us" '.$contactActive.'>Contact<i class="fas fa-chevron-down"></i></a></li>
         <li class="hassubs">
            <a href="#" '.$accountActive.'>Manage Account<i class="fas fa-chevron-down"></i></a>
            <ul>
                <li><a href="profile">My Profile<i class="fas fa-chevron-down"></i></a></li>
                <li><a href="login">Logout<i class="fas fa-chevron-down"></i></a></li>
            </ul>
         </li>
        ';
    }
}

if($SESSION==1){
echo ('
<header class="header">
	<div class="top_bar">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-row">
					<div class="top_bar_contact_item">
                        <div class="top_bar_icon"><i class="icon icon-call-out"alt=""></i></div><a href="tel:+2348064160204">+(234)8064160204</a></div>
                    <div class="top_bar_contact_item email-top-conact"><div class="top_bar_icon">
                        <i class="icon icon-envelope" alt="" style="font-size:20px; paddin-top:10px;"></i></div><a href="mailto:order@klassymall.com">order@klassymall.com</a></div>
					<div class="top_bar_content ml-auto">
						<div class="top_bar_menu">
							<ul class="standard_dropdown top_bar_dropdown">
								<li>
									English <i class="fas fa-chevron-down" style="color:#333"></i>
									<ul>
										<li><a href="#">Hausa</a></li>
										<li><a href="#">Yorube</a></li>
										<li><a href="#">Igbo</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="top_bar_user">
                             '.$topDetails.'
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>

	<!-- Header Main -->

	<div class="header_main">
		<div class="container">
			<div class="row">

				<!-- Logo -->
				<div class="col-lg-3 col-sm-3 col-6 order-1">
					<div class="logo_container">
                      <div class="wishlist logo">
                          <a href="https://klassymall.com">
							<div class="wishlist_content">
                                <div class="wishlist_icon logo-img"><img src="images/ico.png" class="header-app-ico" alt=""></div>
								<div class="wishlist_text logo-text">Klassy Mall</div>
								<div class="wishlist_count logo-motto">Expect much, pay less</div>
							</div>
                          </a>
						</div>

					</div>
				</div>

				<!-- Search -->
				<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
					<div class="header_search">
						<div class="header_search_content">
							<div class="header_search_form_container">
								<div class="header_search_form clearfix">
									<input type="search" required="required" class="header_search_input search-in" placeholder="Search for products..." value="'.$searchVal.'">
									<div class="custom_dropdown">
										<div class="custom_dropdown_list">
											<span class="custom_dropdown_placeholder clc">All Categories</span>
											<i class="fas fa-chevron-down"></i>
											<ul class="custom_list clc">
												<li><a class="clc" href="#">All Categories</a></li>
												<li><a class="clc" href="#">Fashion</a></li>
												<li><a class="clc" href="#">Furnitures</a></li>
												<li><a class="clc" href="#">Electronics</a></li>
												<li><a class="clc" href="#">Accessories</a></li>
                                                <li><a class="clc" href="#">Cosmetics</a></li>
											</ul>
										</div>
									</div>
									<button type="button" onclick="searchProduct(this);" class="header_search_button trans_300" value="Search"><img src="images/search.png" alt=""></button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Wishlist -->
				<div class="col-lg-3 col-6 order-lg-3 order-2 text-lg-left text-right">
					<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
						<div class="wishlist d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist_icon"><img src="images/heart.png" alt=""></div>
							<div class="wishlist_content">
								<div class="wishlist_text"><a href="#">Wishlist</a></div>
								<div class="wishlist_count">115</div>
							</div>
						</div>

						<!-- Cart -->
						<div class="cart">
                          <a href="cart">
							<div class="cart_container d-flex flex-row align-items-center justify-content-end">
								<div class="cart_icon">
									<img src="images/cart.png" alt="">
									<div class="cart_count"><span name="cartCounter"></span></div>
								</div>
								<div class="cart_content">
									<div class="cart_text">Cart</div>
									<div class="cart_price" name="cartTotalPayable">Loading..</div>
								</div>
							</div>
                            <a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Main Navigation -->

	<nav class="main_nav">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="main_nav_content d-flex flex-row">

						<!-- Categories Menu -->

						<div class="cat_menu_container">
							<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
								<div class="cat_burger"><span></span><span></span><span></span></div>
								<div class="cat_menu_text">categories</div>
							</div>

							<ul class="cat_menu">
                                <li class="hassubs">
									<a href="#">Fashion<i class="fas fa-chevron-right"></i></a>
								   <ul>
								   	<li><a href="products?search=bags">Watches<i class="fas fa-chevron-right"></i></a></li>	 
                                    <li><a href="products?search=juba">Jubah<i class="fas fa-chevron-right"></i></a></li>	
                                    <li><a href="products?search=abaya">Abaya<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="products?search=gown">Gown<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="products?search=bags">Hand Bags<i class="fas fa-chevron-right"></i></a></li>
								   	<li><a href="products?search=shoes">Shoes<i class="fas fa-chevron-right"></i></a></li>
								   	<li><a href="products?search=wears">Wears<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="products?search=wears">Jewelleries<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="products?search=Baby Products">Baby Products<i class="fas fa-chevron-right"></i>
								   </ul>
								</li> 
                                <li class="hassubs">
									<a href="#">Cosmetics<i class="fas fa-chevron-right"></i></a>
								   <ul>
								     	<li><a href="products?search=Shampoos">Shampoos<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Powders">Powders<i class="fas fa-chevron-right"></i> 
                                        <li><a href="products?search=Lipstick">Lipstick<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Perfumes">Perfumes<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Bath Oils">Bath Oils<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Eye Shadow">Eye Shadow<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Hair Spray">Hair Spray<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Hair Straighteners">Hair Straighteners<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Face Powders">Face Powders<i class="fas fa-chevron-right"></i>
								   </ul>
								</li> 
                                <li class="hassubs">
									<a href="#">Furnitures<i class="fas fa-chevron-right"></i></a>
								   <ul>
								     	<li><a href="#">Not Available<i class="fas fa-chevron-right"></i>
								   </ul>
								</li> 
                                <li class="hassubs">
									<a href="#">Accessories<i class="fas fa-chevron-right"></i></a>
								   <ul>
								     	<li><a href="#">Not Available<i class="fas fa-chevron-right"></i>
								   </ul>
								</li>
                                <li class="hassubs">
									<a href="#">Electronics<i class="fas fa-chevron-right"></i></a>
								   <ul>
								     	<li><a href="#">Not Available<i class="fas fa-chevron-right"></i>
								   </ul>
								</li> 
                                <li class="hassubs">
									<a href="#">Mobile Phones<i class="fas fa-chevron-right"></i></a>
								   <ul>
								     	<li><a href="#">Not Available<i class="fas fa-chevron-right"></i>
								   </ul>
								</li>
                                <li class="hassubs">
									<a href="products?search=Real Estate">Real Estate</a>
								</li>
                                <li class="hassubs">
									<a href="products?search=Smartwatches">Smartwatches</a>
								</li> 
                                <li class="hassubs">
									<a href="products?search=Phone Accessories">Phone Accessories</a>
								</li>
                                <li class="hassubs">
									<a href="products?search=Health & Beauty">Health & Beauty</a>
								</li>
                                <li class="hassubs">
									<a href="products?search=Vehicles">Vehicles</a>
								</li> 
                                <li class="hassubs">
									<a href="products?search=products">Any</a>
								</li>
							</ul>
						</div>

						<!-- Main Nav Menu -->

						<div class="main_nav_menu ml-auto">
							<ul class="standard_dropdown main_nav_dropdown">
								<li><a href="https://klassymall.com" '.$homeActive.'>Home<i class="fas fa-chevron-down"></i></a></li>
                                <li><a href="about-us" '.$aboutActive.'>About<i class="fas fa-chevron-down"></i></a></li>
								<li><a href="products" '.$productActive.'>Products<i class="fas fa-chevron-down"></i></a></li>
                                '.$manageMenuTemplate.'
							</ul>
						</div>

						<!-- Menu Trigger -->

						<div class="menu_trigger_container ml-auto">
							<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
								<div class="menu_burger">
									<div class="menu_trigger_text">menu</div>
									<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</nav>
	
	<!-- Menu -->

	<div class="page_menu">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="page_menu_content">
						
						<div class="page_menu_search">
								<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products..."  value="'.$searchVal.'">
						</div>
						<ul class="page_menu_nav">
							<li class="page_menu_item">
								<a href="#" >Home<i class="fa fa-angle-down"></i></a>
							</li>
                            <li class="page_menu_item">
								<a href="about-us">About Us<i class="fa fa-angle-down"></i></a>
							</li>
                            <li class="page_menu_item">
								<a href="products">Products<i class="fa fa-angle-down"></i></a>
							</li> 
                            <li class="page_menu_item">
								<a href="contact-us">Contact Us<i class="fa fa-angle-down"></i></a>
							</li>
							<li class="page_menu_item has-children">
								<a href="#">Manage Account<i class="fa fa-angle-down"></i></a>
								<ul class="page_menu_selection">
									<li><a href="login">Signout<i class="fa fa-angle-down"></i></a></li>
									<li><a href="profile">Manage Profile<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="cart">Manage Cart<i class="fa fa-angle-down"></i></a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
');
}else{
   echo ('
   <header class="header">
	<div class="top_bar">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-row">
					<div class="top_bar_contact_item">
                        <div class="top_bar_icon"><i class="icon icon-call-out"alt=""></i></div><a href="tel:+2348064160204">+(234)8064160204</a></div>
                    <div class="top_bar_contact_item email-top-conact"><div class="top_bar_icon">
                        <i class="icon icon-envelope" alt="" style="font-size:20px; paddin-top:10px;"></i></div><a href="mailto:order@klassymall.com">order@klassymall.com</a></div>
					<div class="top_bar_content ml-auto">
						<div class="top_bar_menu">
							<ul class="standard_dropdown top_bar_dropdown">
								<li>
									English <i class="fas fa-chevron-down" style="color:#333"></i>
									<ul>
										<li><a href="#">Hausa</a></li>
										<li><a href="#">Yorube</a></li>
										<li><a href="#">Igbo</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="top_bar_user">
                            <div class="user_icon"><i class="fa fa-user" style="font-size:12px;" alt=""></i></div>
							<div><a href="register">Register</a></div>
							<div><a href="login">Sign in</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>

	<!-- Header Main -->

	<div class="header_main">
		<div class="container">
			<div class="row">

				<!-- Logo -->
				<div class="col-lg-3 col-sm-3 col-8 order-1 logo-wrapper">
					<div class="logo_container">
                      <div class="wishlist logo">
                          <a href="https://klassymall.com">
							<div class="wishlist_content">
                                <div class="wishlist_icon logo-img"><img src="images/ico.png" class="header-app-ico" alt=""></div>
								<div class="wishlist_text logo-text">Klassy Mall</div>
								<div class="wishlist_count logo-motto">Expect much, pay less</div>
							</div>
                          </a>
						</div>

					</div>
				</div>

				<!-- Search -->
				<div class="col-lg-9 col-12 order-lg-2 order-3 text-lg-left text-right">
					<div class="header_search">
						<div class="header_search_content">
							<div class="header_search_form_container">
								<div class="header_search_form clearfix">
									<input type="search" required="required" class="header_search_input search-in" placeholder="Search for products..."  value="'.$searchVal.'">
									<div class="custom_dropdown">
										<div class="custom_dropdown_list">
											<span class="custom_dropdown_placeholder clc">All Categories</span>
											<i class="fas fa-chevron-down"></i>
											<ul class="custom_list clc">
												<li><a class="clc" href="#">All Categories</a></li>
												<li><a class="clc" href="#">Fashion</a></li>
												<li><a class="clc" href="#">Furnitures</a></li>
												<li><a class="clc" href="#">Electronics</a></li>
												<li><a class="clc" href="#">Accessories</a></li>
											</ul>
										</div>
									</div>
									<button type="button" onclick="searchProduct(this);" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	
	<!-- Main Navigation -->

	<nav class="main_nav">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="main_nav_content d-flex flex-row">

						<!-- Categories Menu -->

					
						<div class="cat_menu_container">
							<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
								<div class="cat_burger"><span></span><span></span><span></span></div>
								<div class="cat_menu_text">categories</div>
							</div>

							<ul class="cat_menu">
                                <li class="hassubs">
									<a href="#">Fashion<i class="fas fa-chevron-right"></i></a>
								   <ul>
								   	<li><a href="products?search=bags">Watches<i class="fas fa-chevron-right"></i></a></li>	 
                                    <li><a href="products?search=juba">Jubah<i class="fas fa-chevron-right"></i></a></li>	
                                    <li><a href="products?search=abaya">Abaya<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="products?search=gown">Gown<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="products?search=bags">Hand Bags<i class="fas fa-chevron-right"></i></a></li>
								   	<li><a href="products?search=shoes">Shoes<i class="fas fa-chevron-right"></i></a></li>
								   	<li><a href="products?search=wears">Wears<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="products?search=wears">Jewelleries<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="products?search=Baby Products">Baby Products<i class="fas fa-chevron-right"></i>
								   </ul>
								</li> 
                                <li class="hassubs">
									<a href="#">Cosmetics<i class="fas fa-chevron-right"></i></a>
								   <ul>
								     	<li><a href="products?search=Shampoos">Shampoos<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Powders">Powders<i class="fas fa-chevron-right"></i> 
                                        <li><a href="products?search=Lipstick">Lipstick<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Perfumes">Perfumes<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Bath Oils">Bath Oils<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Eye Shadow">Eye Shadow<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Hair Spray">Hair Spray<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Hair Straighteners">Hair Straighteners<i class="fas fa-chevron-right"></i>
                                        <li><a href="products?search=Face Powders">Face Powders<i class="fas fa-chevron-right"></i>
								   </ul>
								</li> 
                                <li class="hassubs">
									<a href="#">Furnitures<i class="fas fa-chevron-right"></i></a>
								   <ul>
								     	<li><a href="#">Not Available<i class="fas fa-chevron-right"></i>
								   </ul>
								</li> 
                                <li class="hassubs">
									<a href="#">Accessories<i class="fas fa-chevron-right"></i></a>
								   <ul>
								     	<li><a href="#">Not Available<i class="fas fa-chevron-right"></i>
								   </ul>
								</li>
                                <li class="hassubs">
									<a href="#">Electronics<i class="fas fa-chevron-right"></i></a>
								   <ul>
								     	<li><a href="#">Not Available<i class="fas fa-chevron-right"></i>
								   </ul>
								</li> 
                                <li class="hassubs">
									<a href="#">Mobile Phones<i class="fas fa-chevron-right"></i></a>
								   <ul>
								     	<li><a href="#">Not Available<i class="fas fa-chevron-right"></i>
								   </ul>
								</li>
                                <li class="hassubs">
									<a href="products?search=Real Estate">Real Estate</a>
								</li>
                                <li class="hassubs">
									<a href="products?search=Smartwatches">Smartwatches</a>
								</li> 
                                <li class="hassubs">
									<a href="products?search=Phone Accessories">Phone Accessories</a>
								</li>
                                <li class="hassubs">
									<a href="products?search=Health & Beauty">Health & Beauty</a>
								</li>
                                <li class="hassubs">
									<a href="products?search=Vehicles">Vehicles</a>
								</li> 
                                <li class="hassubs">
									<a href="products?search=products">Any</a>
								</li>
							</ul>
						</div>
                        
						<!-- Main Nav Menu -->

						<div class="main_nav_menu ml-auto">
							<ul class="standard_dropdown main_nav_dropdown">
								<li><a href="https://klassymall.com"  '.$homeActive.'>Home<i class="fas fa-chevron-down"></i></a></li>
                                <li><a href="about-us" '.$aboutActive.'>About<i class="fas fa-chevron-down"></i></a></li>
								<li><a href="products"  '.$productActive.'>Products<i class="fas fa-chevron-down"></i></a></li>
								<li><a href="contact-us"  '.$contactActive.'>Contact<i class="fas fa-chevron-down"></i></a></li>
                                <li class="hassubs">
									<a href="#"  '.$accountActive.'>Manage Account<i class="fas fa-chevron-down"></i></a>
									<ul>
										<li><a href="login">Login<i class="fas fa-chevron-down"></i></a></li>
										<li><a href="register">Register<i class="fas fa-chevron-down"></i></a></li>
				        			</ul>
								</li>
							</ul>
						</div>

						<!-- Menu Trigger -->

						<div class="menu_trigger_container ml-auto">
							<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
								<div class="menu_burger">
									<div class="menu_trigger_text">menu</div>
									<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</nav>
	
	<!-- Menu -->

	<div class="page_menu">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="page_menu_content">
						
						<div class="page_menu_search">
								<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products..."  value="'.$searchVal.'">
						</div>
						<ul class="page_menu_nav">
							<li class="page_menu_item">
								<a href="https://klassymall.com">Home<i class="fa fa-angle-down"></i></a>
							</li>
                            <li class="page_menu_item">
								<a href="about-us">About Us<i class="fa fa-angle-down"></i></a>
							</li>
                            <li class="page_menu_item">
								<a href="products">Products<i class="fa fa-angle-down"></i></a>
							</li> 
                            <li class="page_menu_item">
								<a href="contact-us">Contact Us<i class="fa fa-angle-down"></i></a>
							</li>
							<li class="page_menu_item has-children">
								<a href="#">Manage Account<i class="fa fa-angle-down"></i></a>
								<ul class="page_menu_selection">
									<li><a href="login">Login<i class="fa fa-angle-down"></i></a></li>
									<li><a href="register">Register<i class="fa fa-angle-down"></i></a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
 '); 
}
?>
