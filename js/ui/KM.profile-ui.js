function KlassyMallProfiles(){
    
    this.createProfile=function(user){
        var layer=app.find('$profilePanel');
        layer.render(loader);
        
      user.dp=user.dp.toString().replace('..','');
      if(user.dp.startsWith('/')){
         user.dp=hostname+user.dp;
      } 
        
      layer.render(`
          <div class=" profile widget-shadow">
            <div class="profile-top">
                <img src="`+user.dp+`" alt="">
                <h4>`+user.name+`</h4>
                <h5>+(234)`+user.mobile+`</h5>
            </div>
            <div class="profile-text">
                <div class="profile-row">
                    <div class="profile-left">
                        <i class="icon icon-envelope profile-icon"></i>
                    </div>
                    <div class="profile-right">
                        <h4>`+user.email+`</h4>
                        <p>Email</p>
                    </div> 
                    <div class="clearfix"> </div>	
                </div>
                <div class="profile-row row-middle">
                    <div class="profile-left">
                        <i class="icon icon-phone profile-icon"></i>
                    </div>
                    <div class="profile-right">
                        <h4>+(234)`+user.mobile+`</h4>
                        <p>Contact Number</p>
                    </div> 
                    <div class="clearfix"> </div>	
                </div>
                <div class="profile-row row-middle">
                    <div class="profile-left">
                        <i class="icon icon-location-pin profile-icon"></i>
                    </div>
                    <div class="profile-right">
                        <h4>`+user.address+`</h4>
                        <p>Home Address</p>
                    </div> 
                    <div class="clearfix"> </div>	
                </div>
                <div class="profile-row row-middle">
                    <div class="profile-left">
                        <i class="icon icon-info profile-icon"></i>
                    </div>
                    <div class="profile-right">
                        <h4>`+user.description+`</h4>
                        <p>Description</p>
                    </div> 
                    <div class="clearfix"> </div>	
                </div>
                <div class="profile-row">
                    <div class="profile-left">
                        <i class="icon icon-social-facebook profile-icon"></i>
                    </div>
                    <div class="profile-right">
                        <h4>facebook.com/user</h4>
                        <p>Facebook</p>
                    </div> 
                    <div class="clearfix"> </div>	
                </div>
               </div>
            </div>
          `);
     }

};
function initilizeProfile(){
    var layer=app.find('$profilePanel');

    if(sessionExist){
       new KlassyMallProfiles().createProfile(user);
    }else{
      layer.render(`
       <button type="button" class="RetryActivity-trigger" >
          <img src="assets/images/error.png" class="activityViewError"/> 
         <p>Not Available</p>
       </button>
     `);
    } 
}
initilizeProfile();