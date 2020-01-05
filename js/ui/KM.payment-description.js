function KlassyMallCheckout(){
    
    this.createDescription=function(items){
        var layer=app.find('$checkoutDescriptionPanel');
            layer.clear();
        
     var amount=items[items.length-1].payable,
         payableBackup=amount;
         fee=items[1].shipping_fee;
         amount=amount.toString().replace(/\s/g,''); 
         amount=app.toNumber(amount.toString().replace(/₦/g,''));
         fee=fee.toString().replace(/\s/g,''); 
         fee=app.toNumber(fee.toString().replace(/₦/g,''));
         payableBackup=amount;
         amount=(amount+fee);
         storage.setItem('totalPayable',''+amount);
         amount=app.toMoney(amount);
         Prepare('$cartTotalPayable').render(amount);
        

          layer.append(`
             <div class="item_display_container plus_nine">
               <h4>TAX</h4>
               <p style="color:#2ecc71">₦0.00</p>

               <h4 style="padding-top:1em">Total Payable</h4>
               <p style="color:#2ecc71" name="main-TotalPayableAmount" ABSPayable="`+payableBackup+`">₦`+amount+`</p>
             </div>
          `);
    
   }  
}
function initializeCheckoutDescription(){
    var layer=app.find('$checkoutDescriptionPanel'),
        url=hostname+'/server/ui/app.checkout-description-ui.php?request=DETAILS&id='+session;

    var  httpReq=new ayralHttpRequest('GET',url,'default',true);   
    httpReq.execute(function(response){
       if(response!='progress'){
         try{
               var result=response.target.responseText;

               if(result.match(/not_found/)){
                     layer.render(`
                         <div class="item_display_container plus_nine">
                             No Items in your Cart
                        </div>
                   `);
               } 
               else{
                   refreshCartCounts();
                   result=result.toString().replace(/,(?=[^,]*$)/, '');
                   var items=JSON.parse('['+result+']');
                   new KlassyMallCheckout().createDescription(items);
               }
         } 
         catch(error){
              layer.render(`
                   <div class="item_display_container plus_nine">
                           No Items in your Cart
                    </div>
             `);
           }
       }
    });
}
initializeCheckoutDescription();
