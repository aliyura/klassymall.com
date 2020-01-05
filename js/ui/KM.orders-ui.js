function KlassyMallOrders(){
    
    this.createOrder=function(items){
        var layer=app.find('$ordersPanel'),
            order_status='',payment_status='',order_type='';
            layer.clear();
    
        for(item in items){
            
          itemCounter=item;
          item=items[item];
        
          item.customer_DP=item.customer_DP.toString().replace('..','');
          if(item.customer_DP.startsWith('/')){
             item.customer_DP=hostname+item.customer_DP;
          } 
        
          if(item.order_type=='CASH'){
              order_type=`
                <div class="cart_item_title">Order Type </div>
				<p>Cash on Delivery</p>
            `;
          }else{
             order_type=`
                <div class="cart_item_title">Order Type </div>
				<p>Pay Online</p>
            `;  
          }
        
            
         if(item.order_status=='PP' && item.order_type=='CASH'){
             order_status=`
                 <div class="cart_item_title">Order Status</div>
				 <p class="pending">Pending Approval</p>
            `;
         }else if(item.order_status=='AP'){
             order_status=`
                 <div class="cart_item_title">Order Status </div>
				 <p class="aproved">Aproved</p>
            `; 
         }else if(item.order_status=='AC' && item.order_type!='CASH'){
             order_status=`
                 <div class="cart_item_title">Order Status </div>
				 <p class="pending">Pending Approval</p>
            `; 
         }else{
            order_status=`
                 <div class="cart_item_title">Order Status </div>
				 <p>`+item.order_status+`</p>
            `;    
         }
            
         if(item.order_type!='CASH'){
             if(item.payment_status=='PP'){
                 payment_status=`
                   <div class="cart_item_title">Payment Status </div>
                   <p class="pending">Pending</p>
                `;
             } 
             if(item.payment_status=='AC'){
                 payment_status=`
                   <div class="cart_item_title">Payment Status </div>
                   <p class="aproved">Paid</p>
                `;
             }
         }else{
            payment_status='';  
         }

          layer.append(`
             <li class="cart_item clearfix" id="`+item.id+`" name="order_`+item.id+`">
						<div class="cart_item_image">
                         <a href="profile?id=`+item.sender_id+`"><img src="`+item.customer_DP+`" onerror="profilePhotoError(this)" alt=""></a></div>
						<div class="cart_item_info">
							<div class="cart_item_name cart_info_col">
								<div class="cart_item_title">Customer</div>
								<p>`+item.customer_name+`</p>
                                <div class="cart_item_title">Ordered <span class="badge success">`+item.items_count+`</span> Item(s)</div>
								<p>`+item.item_names+`</p>
							</div>
							<div class="cart_item_total cart_info_col" style="text-align:left">
                                `+order_type+`
                                `+order_status+`
							</div>
		                    <div class="cart_item_price cart_info_col" style="text-align:left">
                                <div class="cart_item_title">Delivery Area</div>
								<p>`+item.customer_address_line1+`</p>
							</div>
                            <div class="cart_item_total cart_info_col">
                              <section class="cart-product-controls" >
                                    <div class="cart_item_title">Ordered</div>
                                    <p>`+item.order_date+`</p>
                                    <a href="review?ref=`+item.id+`" class="product_color" style="width:100%; border-top:none; border-bottom:none; text-align:center; display:inline-block; padding:1em; color:#25bb65;">
                                        Review <i class="fa  fa-share"></i>
                                    </a>
                                 </section>
							</div>
                     </div>       
                 
                 </li>	
            `);         
        }
   }  
}
function initilizeOrderItems(){
    var layer=app.find('$ordersPanel'),
        url=hostname+'/server/ui/app.orders-ui.php?request=NEW&id='+session;
        mainTotalPayable=0;
    
    var location=ayralWindow.location.href;
    if(location.toString().match(/orders.php/)){
        url=hostname+'/server/ui/app.orders-ui.php?request=NEW&id='+session;
    }else{
        url=hostname+'/server/ui/app.orders-ui.php?request=HISTORY&id='+session;
    }

    var  httpReq=new ayralHttpRequest('GET',url,'default',true);   
    httpReq.execute(function(response){
       if(response!='progress'){
         try{
               var result=response.target.responseText;
               if(result.match(/not_found/)){
                     layer.render(`
                       <div class="RetryActivity-trigger">
                         <img src="images/error.png" class="activityViewError"/> 
                         <p>No Order Available</p>
                       </div>
                   `);
               } 
               else{
                   result=result.toString().replace(/,(?=[^,]*$)/, '');
                   var items=JSON.parse('['+result+']');
                   new KlassyMallOrders().createOrder(items);
             
               }
         } 
         catch(error){
             print(error);
              layer.render(`
                   <button type="button" class="RetryActivity-trigger"  url="`+url+`" onclick="ordersActivity(1,1);">
                       <img src="images/error.png" class="activityViewError"/> 
                       <p>Connection Failed<br/><b>Try Again</b></p>
                   </button>
             `);
           }
       }
    });
}
initilizeOrderItems();