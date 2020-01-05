function onShippingAddressShange(e){
    var address=Prepare(e).getValue();
        area=address.substr(0,address.indexOf(':')),
        fee=address.substr(address.indexOf(':')+1,address.length),
        totalAmount=Prepare('$main-TotalPayableAmount').getAttribute('ABSPayable'),
         totalAmount=totalAmount.toString().replace(/\s/g,''); 
         totalAmount=app.toNumber(totalAmount.toString().replace(/₦/g,''));
         fee=fee.toString().replace(/\s/g,''); 
         fee=app.toNumber(fee.toString().replace(/₦/g,''));
         totalAmount=(totalAmount+fee);
         storage.setItem('totalPayable',''+totalAmount);
         totalAmount=app.toMoney(totalAmount);
         Prepare('$main-TotalPayableAmount').render(totalAmount);
         Prepare('$cartTotalPayable').render(totalAmount); 
         Prepare('$shippingFee-desc').render('₦ '+app.toMoney(fee));
         Prepare('$shippingArea-desc').render(area+', Nigeria');
    
   var url=hostname+'/server/app.shipping-module.php?request=CHANGE&id='+session+'&fee='+fee+'&area='+area;
    var  httpReq=new ayralHttpRequest('GET',url,'default',false);   
    httpReq.execute(function(response){
       if(response!='progress'){
         try{
               var result=response.target.responseText;
               if(result.match(/success/)){
                   print('modified');
               }else{
                 print(result);
                 warningAlert('Oops! Unable to change your shipping Address');
               }
         } 
         catch(error){
           print(error);
           errorgAlert('Oops! Unable to change your shipping Address');    
         }
       }
    });
}
ayral.prepare(function(){
 var url=hostname+'/server/ui/app.shipping-addressess-ui.php?request=DETAILS&id='+session;
    var  httpReq=new ayralHttpRequest('GET',url,'default',false);   
    httpReq.execute(function(response){
       if(response!='progress'){
         try{
               var result=response.target.responseText;
               if(!result.match(/not_found/)){
                   
                   setTimeout(function(){
                        var layer=app.find('$shippingAddresses'),
                            addresses=result,area='',
                            data ='<option selected value="null">Change shipping City...</option>';
                          
                        if(addresses!='null' && addresses!=null && addresses!=''){
                           addresses=addresses.toString().split(',');
                            
                             for(i=0; i<addresses.length; i++){
                                shipping=addresses[i];
                                area=shipping.substr(0,shipping.indexOf(':')); 
                                data+='<option value="'+shipping+'">'+area+'</option>\n';
                            }
                            layer.setHtml(data);
                        }
                   },500);
               }
         } 
         catch(error){
            print(error);     
         }
       }
    });
});