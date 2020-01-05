function klassyMallTopProducts(){
    
    this.createProduct=function(items,url,type){
        var layer=app.find('$topProductsPanel');
        item_condition='', item_discount='',  masterWidget='',priceDetails='',
        counter=1;

        
       if(items.length>0){
           layer.clear();
           for(i=0; i<items.length; i++){
             item=items[i];
               
               if(item.newPrice!=item.oldPrice){
                priceDetails=`
                   <b "newPrice" style="color:#df3b3b">₦`+item.newPrice+`</b>
                    <span class="oldPrice">₦`+item.oldPrice+`</span>`;
                }else{
                     priceDetails=`
                    <b "newPrice" style="color:#df3b3b">₦`+item.newPrice+`</b>`;
                }
               
               
                 if(item.discount!=''  && item.discount!=null){
                     if(item.discount>0){
                       item_discount='<li class="item_mark item_discount">-'+item.discount+'%</li>';
                     }
                 }
        
               
             layer.append(`
				<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center" onclick="redirectToPreview('`+item.id+`')" >
					<div class="viewed_image"><img  src="`+item.sample+`"  onerror="onImageError(this)" alt=""></div>
					<div class="viewed_content text-center">
						<div class="viewed_price">`+priceDetails+`</div>
						<div class="viewed_name"><a onclick="redirectToPreview('`+item.id+`')">`+item.name+`</a></div>
					</div>
					<ul class="item_marks">
						`+item_discount+`
						<li class="item_mark item_new">new</li>
					</ul>
				</div>
          `); 
           }
       }
    };
}
function initializeTopProducts(url,type){
    var layer=app.find('$topProductsPanel'),
        location=storage.getItem('location'),
        filter='Latest Items';
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
                             storage.setItem('marketURI',url);
                             result=result.toString().replace(/,(?=[^,]*$)/, '');
                             var items=JSON.parse(`[`+result+`]`);
                             new klassyMallTopProducts().createProduct(items,url,type);
                       }else{
                          print('Failed:'+result);
                       }
                   }
         
          } 
           catch(error){
               print(error);
              layer.render(`
                   <button type="button" class="RetryActivity-trigger"  url="`+url+`" onclick="reloadContent(this,'01');">
                       <img src="images/error.png" class="activityViewError"/> 
                        <p>Connection Failed<br/><b>Try Again</b></p>
                   </button>
             `);
           }
       }
    });
}
$(function(){
    var topURI=hostname+'/server/ui/app.market-items-ui.php?request=TOP&id='+session;   
    initializeTopProducts(topURI);
});

