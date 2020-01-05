<?php
if(session_status() == PHP_SESSION_NONE){
  session_start();
}
?>
<header class="header">
	<div class="top_bar">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-row">
					<div class="top_bar_contact_item">
                       <div class="wishlist logo">
                          <a href="https://klassymall.com/">
							<div class="wishlist_content">
                                <div class="wishlist_icon logo-img"><img src="images/ico.png" alt=""></div>
								<div class="wishlist_text logo-text">Klassy Mall</div>
							</div>
                          </a>
						</div> 
                     </div>
					 <div class="top_bar_content ml-auto">
						<div class="top_bar_user">
							<div class="user_icon"><img src="images/user.svg" alt=""></div>
							<div><a href="register">Register</a></div>
							<div><a href="login">Sign in</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>

</header>