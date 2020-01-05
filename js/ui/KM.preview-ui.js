function onSelectSize(e){
  var size=Prepare(e).getAttribute('value');
   Prepare('#selected_size').setAttribute('value',size);
   Prepare('#selected_size').setText(size);

}
function onSelectColor(e){
  var color=Prepare(e).getAttribute('value');
 Prepare('#selected_color').setAttribute('value',color);
}

(function(){
    
Prepare('input,textarea').on('keyup',function(){
        var value=Prepare(this).getValue();
        if(value==''){
            Prepare(this).setError();
        }else{
            Prepare(this).removeError();
        }
    });   
})();

function deleteItem(e,itemID,itemName){
     var controller=Prepare(e);
    
    if(sessionExist){
      new Evironment(controller).setProgress();
      var httpReq=new ayralHttpRequest('GET',hostname+'/server/app.product-module.php?request=DELETE&id='+session+'&itemid='+itemID+'&name='+itemName,'default',true);
          httpReq.execute(function(response){
              if(response=='progress'){
                  new Evironment(controller).setProgress();
              }else{
                  try{
                    var result=response.target.responseText;
                    if(result.toString().match('success')){
                         successAlert('Klassy Mall','Deleted Successfully');
                         controller.render('<i class="fa fa-check"></i> Deleted');
                         setTimeout(function(){
                             app.render('products');
                         },3000);
                    }else{
                      warningAlert(result); 
                      new Evironment(controller).revokeProgress('Try Again');
                    }
                  }
                  catch(error){
                    print(error);
                    new Evironment(controller).revokeProgress('Try Again'); 
                  }
              }
          });

      }else{
        app.render('login');
      }
}
function addToCart(e,itemID,itemName){
     var controller=Prepare(e),
         contity=$('#quantity_input').val();
         if($('#selected_color').length){
           color=$('#selected_color').attr('value');
         }else{
             color='Any';
         }
         
         if($('#selected_size').length){
           size=$('#selected_size').attr('value');
         }else{
             size='Any';
         }

if(sessionExist){
  new Evironment(controller).setProgress();
  var httpReq=new ayralHttpRequest('GET',hostname+'/server/app.cart-module.php?request=ADD&id='+session+'&contity='+contity+'&color='+color+'&size='+size+'&itemid='+itemID+'&name='+itemName,'default',true);
      httpReq.execute(function(response){
          if(response=='progress'){
              new Evironment(controller).setProgress();
          }else{
              try{
                var result=response.target.responseText;
                if(result.toString().match('success')){
                    controller.setHtml('<i class="fa fa-check"></i>&nbsp; Added');  
                    refreshCartCounts();
                    setTimeout(function(){
                         new Evironment(controller).revokeProgress('<i class="fa fa-shopping-cart"></i> Add to Cart');
                    },3000);
                }else{
                  warningAlert(result); 
                  new Evironment(controller).revokeProgress('Try Again');
                }
              }
              catch(error){
                print(error);
                new Evironment(controller).revokeProgress('Try Again'); 
              }
          }
      });
    
  }else{
    app.render('login');
  }
}

function initiatePreviewFor(item){
    
      var layer=document.querySelector('#previewPanel'),
        item_condition='',businessStamp='',warranty='',
        multiple='',colors='',sizes='',price=0,target='',
        sub_items='',sizesContainer='',colorsContainer='',priceDetails='',contityContent='';
        layer=Prepare(layer);
        layer.render(loader);
        
    if(item!='' && item!='null' && item!=null){
        item=JSON.parse(item);
  
         var temp=[item.samples.sample0,item.samples.sample1,item.samples.sample2,item.samples.sample3,item.samples.sample4,item.samples.sample5,item.samples.sample6,item.samples.sample7],
         sub_items='';

         for(i=1; i<temp.length; i++ ){
             sample=temp[i];
             if(sample!='not_set' && sample!='' && sample!=null && typeof sample != typeof undefined){
                 if(sample!=temp[i-1] &&  sample!=temp[0]){
                   sub_items=sub_items+`
                   <li data-image="`+sample+`"><img src="`+sample+`" alt=""></li>`;
                 }
             }
         }  
  
         if(item.colors!=='none'){
           var item_colors=item.colors.split(',');
           if(item_colors.length>0 && item.colors!=""){
               colors=`
               	<ul class="product_color">
				<li>
				<span>Color: </span>
				<div class="color_mark_container">
                     <div id="selected_color" class="color_mark" value="Any"></div></div>
				    <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>
				<ul class="color_list list">
               `;
               for(color in item_colors){   
                  colors+=`
                    <li  onclick="onSelectColor(this);" value="`+item_colors[color]+`"><div class="color_mark" style="background-color:`+item_colors[color]+`"></div></li>
                  `;
               }
               
               colors+=`
               			</ul>
					</li>
				</ul>
               `;
           }
         }
        
       if(item.sizes!=='none'){
           var item_sizes=item.sizes.split(',');
           if(item_sizes.length>0 && item.sizes!=""){
               sizes=`
               	<ul class="product_color clearfix">
		    	<li>
				<span>Size: </span>
				<div class="color_mark_container">
                         <div id="selected_size" value="Any">Any</div>
                     </div>
				<div class="color_dropdown_button">
                     <i class="fas fa-chevron-down"></i></div>
				<ul class="sizes_list list">
               `;
               for(size in item_sizes){
                  sizes+=`
                  <li onclick="onSelectSize(this);" value="`+item_sizes[size]+`"><div>`+item_sizes[size]+`</div></li>
                  `;
               }
               sizes+=`
               	</ul>
				 </li>
				</ul>
               `;
           }
       }
       
       if(item.contity!=null && item.contity!="" && item.contity!="null" ){
          
           contityContent=`
           	<div class="product_quantity clearfix">
			<span>Quantity: </span>
			<input id="quantity_input"  type="text" pattern="[1-9]*" min="1" value="1">
			<div class="quantity_buttons">
				<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
				<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
			</div>
	    	</div>
		   `;
       }
        
        //Target Setup
        if(item.target=="Both" || item.target=="" || item.target==null || item.target=='Null'){
          target='';      
        }else{
           target='For '+item.target;
        }
       
  
        
        if(item.newPrice!=item.oldPrice){
            priceDetails=`
                <b>₦`+item.newPrice+`</b>
                <span class="old_price">₦`+item.oldPrice+`</span>`;
        }else{
             priceDetails=`
                <b>₦`+item.newPrice+`</b>`;
        }
        
        if(typeof user != typeof undefined && user!=null){
       
            if(item.owner_id==user.id){
                previewControllers=`
                    <button type="button" class="button cart_button" onclick="deleteItem(this,'`+item.id+`','`+item.name+`');"><i class="icon icon-trash"></i> Delete Item</button>
                `;
            }else{
                 previewControllers=`
                    <button type="button" class="button cart_button" onclick="addToCart(this,'`+item.id+`','`+item.name+`');"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                    <a href="cart"><button type="button" class="button cart_button preview-checkout"><i class="icon icon-check"></i> Checkout Now</button></a>
                `; 
            }
        }else{
               previewControllers=`
                    <button type="button" class="button cart_button" onclick="addToCart(this,'`+item.id+`','`+item.name+`');"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                    <a href="cart"><button type="button" class="button cart_button preview-checkout"><i class="icon icon-check"></i> Checkout Now</button></a>
                `; 
        }
       
       if(item.vendor==null || item.vendor=="" || item.vendor=="null"){
           item.vendor="Klassy Mall"
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
					<div class="image_selected"><img src="`+item.sample+`" alt=""></div>
				</div>
				<div class="price-description-modal">
				       `+priceDetails+`
				</div>
				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_name">`+item.name+` `+target+` `+warranty+`</div>
						<div class="product_category">
    						Vendor |
    						<h4>`+item.vendor+`</h4>
    						Quantity |
    						<h4>`+item.contity+`</h4> 
						</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>`+item.description+`</p></div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">
									<!-- Product Quantity -->
                                     `+contityContent+`
									 `+sizes+`
									 `+colors+`
								    </div>
                                </div>
								<div class="product_price discount">
                                    `+priceDetails+`
                                </div>
								<div class="button_container">
									`+previewControllers+`
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
        <div  class="RetryActivity-trigger">
          <img src="images/error.png" class="activityViewError"/> 
            <p style="opacity: 0.5">Preview not Available</p>
        </div>  
        `);
    }
    
}
(function(){

    var layer=document.querySelector('#previewPanel'),
        layer=Prepare(layer);
        layer.render(loader);
    
         
    var item=storage.getItem('preview');
    if(item==''||  item=='null' || item==null){
        
       var param=window.location.href.toString(),
               itemid=param.substr(param.indexOf('id=')+3,(param.length));
        
         var httpReq=new ayralHttpRequest('GET',hostname+'/server/ui/app.preview-ui.php?request=1&itemid='+itemid+'&id='+session,'default',true);   
         httpReq.execute(function(response){
            if(response!='progress'){
                var result=response.target.responseText;
                if(result.toString().match(/success:/)){
                    var obj=result.substr(result.indexOf(':')+1,result.length);
                       initiatePreviewFor(obj);
                }else{
                   item=null;
                  initiatePreviewFor(item);
                } 
            }
         });
    }
    else{
     initiatePreviewFor(item);
    }
    
    
    

})();
