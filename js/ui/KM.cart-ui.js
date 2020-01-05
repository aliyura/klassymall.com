var notificatorPayableAmount=0,
    notificatorCartItems=0;

function trashCartItem(e,id){
     Prepare(e).setHtml('<img src="images/loader.gif" class="btn-loader">');
     blockProgress();

    var httpReq=new ayralHttpRequest('GET',hostname+'/server/app.cart-module.php?request=REMOVE&id='+session+'&cid='+id,'default',true);   
     httpReq.execute(function(response){
       if(response!='progress'){
          var result=response.target.responseText;
          revokeProgress();
          if(result.toString().match(/success/)){
              Prepare('$cart_'+id).hide();
              initilizeCartItems();
          }else{
            trigger.setHtml('<img src="images/loader.gif" class="btn-loader">');
            alert('Unable to remove this item from your cart');
          }
       }
     });
}
function onSizeChange(e,id){
    var selectedSize=Prepare(e).getAttribute('value');
        Prepare('$selected_size_'+id).setText(selectedSize);
 
    var httpReq=new ayralHttpRequest('GET',hostname+'/server/app.cart-module.php?request=SIZE&id='+session+'&size='+selectedSize+'&cid='+id,'default',true);   
     httpReq.execute(function(response){
        if(response!='progress'){
           var result=response.target.responseText;
           //print(result);  
        }
     });
}
function onColorChange(e,id){
    var selectedColor=Prepare(e).getAttribute('value');
        Prepare('$selected_color_'+id).setBackground(selectedColor);
    
    var httpReq=new ayralHttpRequest('GET',hostname+'/server/app.cart-module.php?request=COLOR&id='+session+'&color='+selectedColor+'&cid='+id,'default',true);   
     httpReq.execute(function(response){
        if(response!='progress'){
           var result=response.target.responseText;
           //print(result);  
        }
     }); 
}
function onContityChange(id,operator){
    var contity=Number(Prepare('$contity_'+id).getValue()),
        initialPrice=Prepare('$price_'+id).getAttribute('absPrice'),
        totalPrice=Prepare('$total_'+id),
        totalPayableAmount=Prepare('$totalPayable'),
        total=initialPrice;
        
    contity=app.toNumber(contity);
    initialPrice=app.toNumber(initialPrice);
    totalPayableAmount=app.toNumber(totalPayableAmount);

if(operator!='?'){
    if(operator=='+'){
        contity++;
    }else{
       if(contity>1){
         contity--;
        }
    }
}
total=app.toMoney((initialPrice*contity));
totalPrice.render('₦'+total);
Prepare('$contity_'+id).setValue(contity);

var cartItems=window.document.querySelectorAll('.cart_item'),
    tmpPayable=0,payable=0;
for(i=0; i<cartItems.length; i++){
   item=cartItems[i];
   tmpPayable=item.querySelector('#total_'+Prepare(item).getAttribute('id')).textContent;
   tmpPayable=tmpPayable.replace(/\s/g,'');
   tmpPayable=tmpPayable.replace(/₦/g,'');
   tmpPayable=app.toNumber(tmpPayable);
   payable+=tmpPayable;
}
payable=app.toMoney(payable);
Prepare('$totalPayable').render('₦ '+payable); 

var httpReq=new ayralHttpRequest('GET',hostname+'/server/app.cart-module.php?request=CONTITY&id='+session+'&contity='+contity+'&cid='+id,'default',true);   
 httpReq.execute(function(response){
    if(response!='progress'){
       var result=response.target.responseText;
       //print(result);  
    }
 });
}

function KlassyMallCarts(){
    
    this.createCart=function(items){
        var layer=app.find('$cartPanel'),
            footer=app.find('$cartFooterPanel'),
            itemCounter=0,payable=0,cartItemsCounts=0;
            selectedColor='',selectedSize='',colors='',sizes='',contityContent='',
            availableColors='',availableSizes='',selected=0;
            layer.clear();
    
        for(item in items){
          itemCounter=item;
          item=items[item];

          payable+=app.toNumber(item.total);
          cartItemsCounts++;
            
         if(item.selected_size!='Any' && item.selected_size!='' && item.selected_size!=null){
            selectedSize=item.selected_size;
         }else{
            selectedSize=item.selected_size;  
         }    
         if(item.selected_color!='Any' && item.selected_color!='' && item.selected_color!=null){
            selectedColor=item.selected_color;
         }
         
        if(item.colors!='Any' && item.colors!='none' && item.colors!=null && item.colors!=''){
            var colorsBase=item.colors.split(',');
            colors=`<ul class="product_color">
		     	<li>
				<span>Color: </span>
				<div class="color_mark_container">
               <div id="selected_color_`+item.id+`" name="selected_color_`+item.id+`" class="color_mark" value="`+selectedColor+`" style="background-color:`+selectedColor+`"></div></div>
				<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>
				<ul class="color_list list">
			`;

            for(color in colorsBase){
                color=colorsBase[color];
                colors+=`
                    <li  onclick="onColorChange(this,'`+item.id+`');" value="`+color+`"><div class="color_mark" style="background-color:`+color+`"></div></li>
                `;
            }
    
            colors+=`
                	</ul>
				</li>
			</ul>
            `;
        } 
        
  
        if(item.sizes!='Any' && item.sizes!='none'  && item.sizes!=null && item.sizes!=''){
            var sizesBase=item.sizes.split(',');
            sizes=`
            <ul class="product_color clearfix">
							<li>
								<span>Size: </span>
								<div class="color_mark_container">
                                 <div id="selected_size_`+item.id+`" name="selected_size_`+item.id+`" value="`+selectedSize+`">`+selectedSize+`</div>
                             </div>
								<div class="color_dropdown_button">
                             <i class="fas fa-chevron-down"></i></div>
								<ul class="sizes_list list">
            `;
            
            for(size in sizesBase){
                size=sizesBase[size];
                  sizes+=`
                  <li onclick="onSizeChange(this,'`+item.id+`');" value="`+size+`"><div>`+size+`</div></li>
                `
            }
            
            sizes+=`	
               </ul>
			 </li>
			</ul>`;
        }
            
        if(item.contity!=null && item.contity!="" && item.contity!="null" ){
            contityContent=`
            	<div class="product_quantity clearfix">
				<span>Quantity: </span>
				<input id="quantity_input" name="contity_`+item.id+`" onkeyup="onContityChange('`+item.id+`','?');" type="text" pattern="[1-9]*" value="`+item.contity+`">
				<div class="quantity_buttons">
					<div id="quantity_inc_button" class="quantity_inc quantity_control" onclick="onContityChange('`+item.id+`','+');"><i class="fas fa-chevron-up"></i></div>
					<div id="quantity_dec_button" class="quantity_dec quantity_control" onclick="onContityChange('`+item.id+`','-');"><i class="fas fa-chevron-down"></i></div>
				</div>
			 </div>
            `;
          }
        
        
          layer.append(`
             <li class="cart_item clearfix" id="`+item.id+`" name="cart_`+item.id+`">
						<div class="cart_item_image"><img onclick="redirectToPreview('`+item.item_id+`')"  src="`+item.sample+`" onerror="onImageError(this)" alt=""></div>
						<div class="cart_item_info">
							<div class="cart_item_name cart_info_col">
								<div class="cart_item_title">Name</div>
								<div class="cart_item_text">`+item.name+`</div>
							</div>
							<div class="cart_item_price cart_info_col">
								<div class="cart_item_title">Price</div>
								<div class="cart_item_text" name="price_`+item.id+`" absPrice="`+item.price+`">₦ `+item.price+`</div>
							</div>
							<div class="cart_item_total cart_info_col">
								<div class="cart_item_title">Total</div>
								<div class="cart_item_text" id="total_`+item.id+`"  name="total_`+item.id+`">₦ `+item.total+`</div>
							</div>
                     </div>       
                 <section class="cart-product-controls">
                         `+contityContent+`
                         `+sizes+`
						 `+colors+`
                       <ul class="product_color cart-trash danger" style="width: 60px;text-align: center;" onclick="trashCartItem(this,'`+item.id+`')">
							<i class="icon icon-trash"></i>
						</ul>
                     </section>
                 </li>	
            `);
            
        }

        payable=app.toMoney(payable);
        notificationPayableAmount=payable;
        footer.render(`
            <div class="order_total">
               <div class="order_total_content text-md-right">
                  <div class="order_total_title">Order Total:</div>
                  <div class="order_total_amount" name="totalPayable">₦ `+payable+`</div>
                </div>
            </div>

            <div class="cart_buttons">
                <a href="products" type="button" class="btn button cart_button_clear default" style="height:60px" ><i class="icon icon-basket"></i> Shop More</a>
               <a href="checkout">
                <button type="button" class="button cart_button_checkout">Continue to Checkout</button>
                </a>
            </div>
        `);
   }  
}
function initilizeCartItems(){
    var layer=app.find('$cartPanel'),
        url=hostname+'/server/ui/app.cart-ui.php?request=DETAILS&id='+session;
        mainTotalPayable=0;

    var  httpReq=new ayralHttpRequest('GET',url,'default',true);   
    httpReq.execute(function(response){
       if(response!='progress'){
         try{
               var result=response.target.responseText;
               if(result.match(/not_found/)){
                     layer.render(`
                       <div class="RetryActivity-trigger">
                         <img src="images/error.png" class="activityViewError"/> 
                         <p>No Items Available in Your Cart</p>
                       </div>
                   `);
               } 
               else{
                   refreshCartCounts();
                   result=result.toString().replace(/,(?=[^,]*$)/, '');
                   var items=JSON.parse('['+result+']');
                   new KlassyMallCarts().createCart(items);
               }
         } 
         catch(error){
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
initilizeCartItems();
refreshCartCounts();