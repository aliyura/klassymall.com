function klassyMallProducts(){
    
    this.createProduct=function(items,url,type){
        var layer;
        item_condition='',  masterWidget='',
        counter=1;
        switch(type){
            case 1:
                filter='Hand Bags'; 
                layer=app.find('$firstTabPanel');
            break;
            case 2:
              filter='Ladies Shoes';
              layer=app.find('$secondTabPanel');
            break;
            case 3:
              filter='Ladies Wears';
              layer=app.find('$thirdTabPanel');
            break;
       }

       if(items.length>0){
           layer.clear();
           for(i=0; i<items.length; i++){
             item=items[i];
             layer.append(`
              <div class="item-widget product_item is_new">
             	<div class="product_image d-flex flex-column align-items-center justify-content-center">
                <img onclick="redirectToPreview('`+item.id+`')" src="`+item.sample+`" onerror="onImageError(this)" alt=""></div>
             	<div class="product_content" onclick="redirectToPreview('`+item.id+`')" >
             		<div class="product_price discount">₦`+item.newPrice+`</div>
             		<div class="product_name"><div><a href="#" tabindex="0">`+item.name+`</a></div></div>
             	</div>
             	<div class="product_fav"><i class="fas fa-heart"></i></div>
             	<ul class="product_marks">
             		<li class="product_mark product_discount">-25%</li>
             		<li class="product_mark product_new">new</li>
             	</ul>
             </div>
          `); 
           }
       }
    };
}
function initializeCategoryProducts(url,type){
    var layer=app.find('$firstTabPanel'),
        location=storage.getItem('location'),
        filter='Latest Items';
    
    
    switch(type){
        case 1:
            filter='Hand Bags'; 
            layer=app.find('$firstTabPanel');
        break;
        case 2:
          filter='Ladies Shoes';
          layer=app.find('$secondTabPanel');
        break;
        case 3:
          filter='Ladies Wears';
          layer=app.find('$thirdTabPanel');
        break;
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
                         storage.setItem('marketURI',url);
                         result=result.toString().replace(/,(?=[^,]*$)/, '');
                         var items=JSON.parse(`[`+result+`]`);
                         new klassyMallProducts().createProduct(items,url,type);
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
var tabs1_URI=hostname+'/server/ui/app.market-items-ui.php?request=Bags&id='+session,
    tabs2_URI=hostname+'/server/ui/app.market-items-ui.php?request=Shoes&id='+session,
    tabs3_URI=hostname+'/server/ui/app.market-items-ui.php?request=Wears&id='+session;
    
    initializeCategoryProducts(tabs1_URI,1);
    initializeCategoryProducts(tabs2_URI,2);
    initializeCategoryProducts(tabs3_URI,3);
});

