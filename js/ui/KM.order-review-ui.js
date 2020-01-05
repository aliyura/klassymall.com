Prepare('input,textarea').on('keyup',function(){
   var value=Prepare(this).getValue();
   if(value==''){
       Prepare(this).setError();
   }else{
       Prepare(this).removeError();
   }
});   


//{
//    id: "5cfddbb9e6931", sender_id: "5cfddab2c32ac", item_names: "Handbag", items_count: "1", type: "CASH", …}
//customer_DP: "/dps/default/dp.jpg"
//customer_address_line1: "No 1 Sabuwar Kasuwa, Garo Kano State"
//customer_address_line2: "No 1 Sabuwar Kasuwa, Garo Kano State"
//customer_email_address: "Garoabdul@gmail.com"
//customer_mobile_number: "08067135745"
//customer_name: "Abdul Azeez"
//delivery_city: "Kano"
//id: "5cfddbb9e6931"
//item_id: "5cfa7ab57a1dc"
//item_names: "Handbag"
//items_count: "1"
//order_date: "1 week ago"
//owner_id: "5ccd948b14b7e"
//payment_status: "P"
//ref: "275996"
//samples: "http://rabsdeveloper.apps:100/projects/klassymall.com/app/samples/5ccd948b14b7e/KM-5cfa7ab57a1e1.jpg"
//selected_color: "Blue"
//selected_size: "Any"
//sender_id: "5cfddab2c32ac"
//shipping_area: "Kano"
//shipping_code: "0110"
//shipping_fee: "800"
//status: "PP"
//total: "7800"
//type: "CASH"
//vendor: "Klassy Mall"


function KlassyMallReviews(){
    
    this.createReview=function(item){
        var layer=app.find('$previewPanel'),
            item_condition='',businessStamp='',warranty='',
             multiple='',color='',size='',price=0,target='',
             sub_items='',sizesContainer='',colorsContainer='',priceDetails='',contityContent='',
             previewControllers='',order_type='';
             layer.render(loader);

     if(item!='' && item!='null' && item!=null){
         
         var samples=item.samples,
             sample;
         if(samples.toString().match(/,/g)){
             samples=samples.split(',');
             for(i=0; i<samples.length; i++){
                 sample=samples[i];
                 sub_items=sub_items+`
                   <li data-image="`+sample+`"><img src="`+sample+`" alt=""></li>`;
             }
         }else{
            sample=samples; 
            sub_items=sub_items+`
                   <li data-image="`+sample+`"><img src="`+sample+`" alt=""></li>`;
         }
         
        
         if(item.color!=='none'){
             color=`
               	<ul class="product_color">
				<li>
				<span>Color: </span>
				<div class="color_mark_container">
                     <div id="selected_color" class="color_mark" style="background-color:`+item.color+`" value="Any"></div></div>
				    <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>
                       <ul class="color_list list">
                       </ul>
					</li>
				</ul>
               `;
        }
        
       if(item.size!=='none'){
              size=`
               	<ul class="product_color clearfix">
		    	<li>
				<span>Size: </span>
				<div class="color_mark_container">
                  <div id="selected_size" value="`+item.size+`">`+item.size+`</div>
                </div>
				<div class="color_dropdown_button">
                <i class="fas fa-chevron-down"></i></div>
				 </li>
				</ul>
               `;
       }
         
         
        var total=app.toMoney(Number(item.total)+Number(item.shipping_fee));
        priceDetails=`
            <div class="fee-container">
                <b>₦`+app.toMoney(Number(item.total))+`</b>
                <h5>Total</h5>
            </div>
            <div class="fee-container">
                <b>₦`+app.toMoney(Number(item.shipping_fee))+`</b>
                <h5>Shipping Fee</h5>
            </div>
            <div class="fee-container">
                <b style="font-size:20px">₦`+total+`</b>
                <h5>Total Payable</h5>
            </div>
        `;

        if(item.type=='CASH'){
              order_type=`
                Cash on Delivery
            `;
          }else{
             order_type=`
				Pay Online
            `;  
          }
         
        layer.render(`
          <div class="container">
			<div class="row">
				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						`+sub_items+`
					</ul>
				</div>
				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="`+sample+`" alt=""></div>
				</div>
				<div class="price-description-modal">
				       `+priceDetails+`
				</div>
				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_name">`+item.item_names+` `+target+` `+warranty+`</div>
                        <div class="product_category">
    						Customer |
    						<h4>`+item.customer_name+`</h4>
						</div>
                       <div class="product_category">
    						Customer Mobile |
    						<h4>`+item.customer_mobile_number+`</h4>
						</div> 
                        <div class="product_category">
    						Order Type |
    						<h4>`+order_type+`</h4>
						</div> 
                        <div class="product_category">
    						Delivery Address |
    						<h4>`+item.customer_address_line1+`</h4>
						</div> 
                        <div class="product_category">
    						Delivery City |
    						<h4>`+item.shipping_area+`</h4>
						</div>

						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">
									<!-- Product Quantity -->
									 `+size+`
									 `+color+`
								    </div>
                                </div>
								<div class="discount">
                                    `+priceDetails+`
                                </div>
								<div class="button_container">
                                    <button type="button" class="button cart_button"><i class="fa fa-check"></i> Approve</button>

                                   <button type="button" class="button cart_button preview-checkout"><i class="fa fa-times"></i> Reject</button>

								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
        `);
       }else{
             layer.render(`
              <div class="RetryActivity-trigger">
                <img src="images/error.png" class="activityViewError"/> 
                <p>Oops! This order is no longer Available</p>
              </div>`);
           
       }
   }  
}
(function(){
  var layer=document.querySelector('#previewPanel'),
  layer=Prepare(layer);
  layer.render(loader);
   
    var location=ayralWindow.location.href;
    if(location.toString().match(/ref=/)){

       var ref=location.substring(location.indexOf('ref')+4,location.length);
           ref=ref.trim();

       var httpReq=new ayralHttpRequest('GET',hostname+'/server/ui/app.order-review-ui.php?request=ORDER&orderid='+ref+'&id='+session,'default',true);   
       httpReq.execute(function(response){
          if(response!='progress'){
              
                var result=response.target.responseText;
                if(result.match(/not_found/)){
                     layer.render(`
                       <div class="RetryActivity-trigger">
                         <img src="images/error.png" class="activityViewError"/> 
                         <p>Oops! This order is no longer Available</p>
                       </div>
                   `);
               } 
               else{
                   var items=JSON.parse(result);
                   new KlassyMallReviews().createReview(items);
             
               }
          }
       });
    }

})();
