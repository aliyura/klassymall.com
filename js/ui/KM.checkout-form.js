ayral.prepare(function(){
    
    var layer=Prepare('$checkoutPanel'),
        orderId=Math.floor(Math.random() * 1000000);

    if(sessionExist){ 

        layer.render(`                 
        <section class="orderDetails-body">
               <div class="card order-description" style="margin-left:0;">
                    <h2 align="center">New Order</h2>
                </div>    
               <ul class="list-group mb-3 z-depth-1" >
                 <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                    <h6 class="my-0"><span id="o-full-name">
                    <b style="color:#28c069; padding-left:5px;"><span name="OrderReference-number">REF #`+orderId+`</span></b></h6>
                     <p><span class="text-muted">&nbsp;Email: <span  name="o-email" style="color:#333">`+user.email+`</span></span></p>
                     <p><span class="text-muted">&nbsp;Mobile: <span  name="o-mobile" style="color:#333">0`+user.mobile+`</span></span></p>
                     <span class="text-muted">&nbsp;Address Line: <span name="o-address" style="color:#333">`+user.address+`</span></span>
                     </div>
                </ul>
               <div class="checkout-form-wrapper"  edit="true" id="checkoutForm_wrapper">
                <div class="row">
                 <div class="col-md-12 col-xs-12">
                     <div class="form-group">
                         <label>Full Name<span style="color:red">*</span></label>
                         <input type="text"  name="name" id="name" value="`+user.name+`" class="form-control plus_five">
                     </div>                           
                 </div>                            
                 </div> 
                 <div class="row multi-wrp">
                     <div class="col-md-6 col-xs-12 multi-child">
                         <div class="form-group">
                             <label for="">Email Address<span style="color:red">*</span></label>
                             <input type="tel" value="`+user.email+`" id="email" name="email" onkeyup="changeEmail(this);" class="form-control">
                         </div>                           
                     </div>                            
                 <div class="col-md-6 col-xs-12 multi-child">
                         <div class="form-group">
                             <label>Phone Number<span style="color:red">*</span></label> 
                             <input type="tel" value="0`+user.mobile+`"  maxlength="11" id="mobile" name="mobile" onkeyup="changeMobile(this);" class="form-control">
                         </div>                           
                     </div>                            
                 </div> 

               <div class="row multi-wrp">
                      <div class="col-md-6 col-xs-12 multi-child">
                         <div class="form-group">
                             <label>Address line 1<span style="color:red">*</span></label>
                              <input type="text" value="`+user.address+`"  id="address1" name="address1" onkeyup="changeAddress(this);" class="form-control">
                         </div>                           
                     </div>                            
                    <div class="col-md-6 col-xs-12 multi-child">
                         <div class="form-group">
                              <label>Address line 2</label>
                              <input type="text"  id="address2" name="address2" class="form-control">
                         </div>                           
                     </div>                          
                 </div>   

               <div class="row multi-wrp">
                      <div class="col-md-6 col-xs-12 multi-child">
                         <div class="form-group">
                             <label>Zip Code</label>
                              <input type="text"  id="zipCode" name="zipCode" placeholder="e.g 100242" class="form-control">
                         </div>                           
                     </div>                            
                    <div class="col-md-6 col-xs-12 multi-child">
                         <div class="form-group">
                              <label>Alternative Phone Number</label>
                              <input type="text"  id="amobile" name="amobile" class="form-control">
                         </div>                           
                     </div>                          
                 </div>   

                     <div class="row multi-wrp">
                         <div class="col-md-6 col-xs-12 multi-child">
                             <div class="form-group">
                                 <label>Who will receive?</label>
                                 <select id="who" name="who" class="form-control"> 
                                 <option value="null" selected>who will receive this order...</option> 
                                 <option>I will com to receive</option> 
                                 <option>I will send someone to receive</option> 
                                 <option>Bring it to my address</option> 
                                 <option>Not sure yet</option> 
                                 </select>
                             </div>                           
                         </div>                            
                      <div class="col-md-6 col-xs-12 multi-child">
                         <div class="form-group">
                         <label>Who will receive?</label> 
                         <select id="when" name="when" class="form-control"> 
                         <option value="null" selected>who will receive this order...</option> 
                         <option>I will com to receive</option> 
                         <option>I will send someone to receive</option> 
                         <option>Bring it to my address</option> 
                         <option>Not sure yet</option> 
                         </select>
                         </div>                           
                     </div>                            
                     </div>   
                   <div class="row">                           
                         <div class="col-md-12 col-xs-12">
                             <div class="form-group">
                                  <label>Description</label>
                                 <textarea type="text"  id="description" name="description" class="form-control"></textarea>
                             </div>                           
                         </div>                            
                     </div>
                     <div class="row">
                        <div class="col-md-12 col-xs-12">
                             <p>Preferences are used to plan your delivery. However, shipments can sometimes arrive early or later than planned.</p> 
                             <h3>Weekend Delivery</h3> 
                        </div> 
                     </div>      
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                             <p>I can receive package on</p>
                             <div class="checkbox-inline">
                                 <div actas="wrapper"  class="check signupCheck-wrp">
                                    <input type="checkbox" name="terms"  data-labelauty="Sunday"/>
                                 </div> 
                             </div> 
                            <div class="checkbox-inline">
                                 <div actas="wrapper"  class="check signupCheck-wrp">
                                    <input type="checkbox" name="terms"  data-labelauty="Saturday"/>
                                </div> 
                         </div>                                                 
                     </div>                         
                </div> 
           </div>
        </section>
        `);
    }else{
        app.render('login');
    }
});