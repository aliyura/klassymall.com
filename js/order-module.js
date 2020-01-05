ayral.prepare(function(){
    
    app.find('input,textarea').on('keyup',function(){
        var value=Prepare(this).getValue();
        if(value==''){
            Prepare(this).setError();
        }else{
            Prepare(this).removeError();
        }
    }); 
    app.find('$mobile').on('keyup',function(){
        var value=Prepare(this).getValue();
        if(value=='' || count(value)<11 || notNumbers(value)){
            Prepare(this).setError();
        }else{
            Prepare(this).removeError();
        }
    }); 
    app.find('$email').on('keyup',function(){
        var value=Prepare(this).getValue();
        if(value=='' || notMail(value)){
            Prepare(this).setError();
        }else{
            Prepare(this).removeError();
        }
    });
});
function changeEmail(e){
    var emailDesc=Prepare('$o-email'),
        email=Prepare(e).getValue();
        emailDesc.setText(email);
}
function changeMobile(e){
    var mobileDesc=Prepare('$o-mobile'),
        mobile=Prepare(e).getValue();
        mobileDesc.setText(mobile);
}
function changeAddress(e){
    var addressDesc=Prepare('$o-address'),
        address=Prepare(e).getValue();
        addressDesc.setText(address);
}
function initiateOrder(e,type){
    var inName=Prepare('$name'),
        inEmail=Prepare('$email'),
        inMobile=Prepare('$mobile'), 
        inAaddress1=Prepare('$address1'),
        deliveryArea=Prepare('$shippingArea-desc').getText(),
        deliveryFee=Prepare('$shippingFee-desc').getText(), 
        referenceNumber=Prepare('$OrderReference-number').getText(),
        name=inName.getValue(),
        email=inEmail.getValue(),
        mobile=inMobile.getValue(),
        controller=Prepare(e),
        address1=inAaddress1.getValue();
        deliveryArea=deliveryArea.replace(/, Nigeria/g,'');
        deliveryArea=deliveryArea.replace(/\s/g,''); 
        deliveryFee=deliveryFee.replace(/\s/g,'');
        deliveryFee=deliveryFee.replace(/₦/g,'');
        referenceNumber=referenceNumber.replace(/\s/g,'');
        referenceNumber=referenceNumber.replace(/REF/g,'');
        referenceNumber=referenceNumber.replace(/#/g,'');
    
 
         if(name=='' || count(name)<3){
            inName.setError();
         }else{
            inName.removeError(); 
         }if(email=='' || count(email)<3 || notMail(email)){
            inEmail.setError();
         }else{
            inEmail.removeError(); 
         }if(mobile=='' || count(mobile)<11 || notNumbers(mobile)){
            inMobile.setError();
         }else{
            inMobile.removeError(); 
         }if(address1=='' || count(address1)<3){
            inAaddress1.setError();
         }else{
            inAaddress1.removeError(); 
         }

        if(name!=='' && count(name)>3 && email!=='' && count(email)>3 && mobile!=='' && count(mobile)>10){
            
            if(isMail(email)){
               inEmail.removeError();   
            }else{
                 inEmail.setError(); 
            } 
            if(isNumbers(mobile)){
               inMobile.removeError();   
            }else{
               inMobile.setError(); 
            }
            
            if(isMail(email) && isNumbers(mobile)){
              
             if(sessionExist){
 
                     new Evironment(controller).setProgress('Processing..');

                     var httpReq=new ayralHttpRequest('POST',hostname+'/server/app.order-module.php?request=ORDER&id='+session+'&area='+deliveryArea+'&fee='+deliveryFee+'&type='+type+'&ref='+referenceNumber,'default',true);   
                     httpReq.execute(function(response){
                        if(response!='progress'){
                            var result=response.target.responseText;
                            if(result.toString().match(/success/)){
                                
                                if(type=='ONLINE'){
                                    app.render('add-payment?ref='+referenceNumber);
                                }else{
                                     app.render('order-initiated?ref='+referenceNumber);
                                }

                            }else{
                                  new Evironment(controller).revokeProgress('Try Again');
                                  warningAlert('Oops! Unable to process your order!');
                            } 
                        }
                     });
            }else{
                app.render('login');
            }
        }
    }
}
       