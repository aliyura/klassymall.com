function klassyMallProducts(){
    
    this.createProduct=function(items,url,type){
        var layer=app.find('$km-productsPanel');
        item_condition='', item_discount='',  masterWidget='',priceDetails='',
        counter=1;

     if(items.length>0){
       //initializing header
       layer.append(`
            <div class="shop_bar clearfix">
            <div class="shop_product_count"><span class="badge">`+items.length+`</span> Products Found</div>
            <div class="shop_sorting">
                <span>Sort by:</span>
                <ul>
                    <li>
                     <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></i></span>
                        <ul>
                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                            <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                        </ul>
                    </li>
                </ul>
            </div>
          </div>
        `);
       }
       for(i=0; i<items.length; i++){
          item=items[i];
           
           item.name= item.name.replace(/<br\/>/,' ');
           storage.setItem('product_'+item.id,JSON.stringify(item));
        
            if(item.newPrice!=item.oldPrice){
                priceDetails=`
                   <span "newPrice" style="color:#df3b3b">₦`+item.newPrice+`</span>
                    <span class="oldPrice">₦`+item.oldPrice+`</span>`;
            }else{
                 priceDetails=`
                    <b "newPrice" style="color:#df3b3b">₦`+item.newPrice+`</b>`;
            }
       
            if(item.discount!=''  && item.discount!=null){
               item_discount='<li class="product_mark product_discount">-'+item.discount+'%</li>';
             }
        
           //initializing the items
           layer.append(`
              <div class="item-widget product_item is_new">
             	<div class="product_image d-flex flex-column align-items-center justify-content-center">
                <img onclick="redirectToPreview('`+item.id+`')" src="`+item.sample+`" onerror="onImageError(this)" alt=""></div>
             	<div class="product_content" onclick="redirectToPreview('`+item.id+`')" >
             		<div class="product_price discount">
                      `+priceDetails+`
                    </div>
             		<div class="product_name"><div><a href="#" tabindex="0">`+item.name+`</a></div></div>
             	</div>
             	<ul class="product_marks">
             		`+item_discount+`
             		<li class="product_mark product_new">new</li>
             	</ul>
             </div>
          `);
         
     }
  };
}
function initializeMarketProducts(url,open,business){
    var filter=search,
        layer=app.find('$km-productsPanel'),
        location=storage.getItem('location');
    
    if(location=='' || location=='null'){
        location='Nigeria';
    }
    layer.render(loader);
    
    var  httpReq=new ayralHttpRequest('GET',url,'default',true);   
    httpReq.execute(function(response){
       if(response!='progress'){
            try{
               var result=response.target.responseText;
                   if(result.match(/not_match/)){
                       
                      layer.render(`
                          <div  class="RetryActivity-trigger">
                            <img src="images/error.png" class="activityViewError"/> 
                             <p >`+filter+` not Available</p>
                          </div>                           
                      `); 
                    }
                   else if(result.match(/not_found/)){
                       layer.render(`
                          <div  class="RetryActivity-trigger">
                            <img src="images/error.png" class="activityViewError"/> 
                             <p >No Items Available</p>
                          </div>                           
                      `);         
                   }
                   else{
                       if(result.match(/:/)){
                         layer.clear();
                         storage.setItem('marketURI',url);
                         result=result.toString().replace(/,(?=[^,]*$)/, '');
                         var items=JSON.parse(`[`+result+`]`);
                         new klassyMallProducts().createProduct(items,url,1);
                       }else{
                          print('Failed:'+result);
                       }
                   }
         
          } 
           catch(error){
              layer.render(`
                   <button type="button" class="RetryActivity-trigger"  url="`+url+`" onclick="RetryActivity(this,'01');">
                       <img src="images/error.png" class="activityViewError"/> 
                        <p>Connection Failed<br/><b>Try Again</b></p>
                   </button>
             `);
           }
       }
    });
}
function initializeMoreItems(url){
    var moreLoader=$('#moreLoader-wrapper');
    moreLoader.show();
    
    var  httpReq=new ayralHttpRequest('GET',url,'default',true);   
    httpReq.execute(function(response){
       if(response!='progress'){
         try{
            
              var result=response.target.responseText;
              if(!result.match(/not_found/) && !result.match(/not_match/)){
                if(result.match(/:/)){
                    result=result.toString().replace(/,(?=[^,]*$)/, '');
                    var items=JSON.parse(`[`+result+`]`);
                    new klassyMallProducts().createProduct(items,url,1);
                    moreLoader.hide();
                
                }else{
                  moreLoader.hide();
                }
              }
         }
         catch(error){
             moreLoader.hide();
             print(error);
         }
       }else{
           moreLoader.show();
       }
    });
}
var locationUri,uri,number=0,previous=0;
$(window).scroll(function(){
  var moreLoader=$('#market-moreLoader');
   uri=storage.getItem('marketURI');
   if(document.querySelector('[marketMaster="master"]')){
      number=document.querySelector('[marketMaster="master"]').getAttribute('number');
   }
   if(typeof number != typeof undefined && number>0){
       
       if(uri!='' && uri!=null){
           
           if(number!=previous){
               if(uri.match(/&next/)){
                   uri=uri.substr(0,uri.indexOf('&next')-1);
               }
               moreLoader.show();
               uri=uri+'&next='+number;
               uri=uri.replace(/ /g,'');
               initializeMoreItems(uri);
               previous=number;
              
           }else{
               moreLoader.hide();
           }
       }
   }
});
var url=hostname+'/server/ui/app.market-items-ui.php?request='+search+'&id='+session;
initializeMarketProducts(url);
