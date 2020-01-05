ayral.prepare(function(){

    app.find('input,textarea').on('keyup',function(){
        var value=Prepare(this).getValue();
        if(value==''){
            Prepare(this).setError();
        }else{
            Prepare(this).removeError();
        }
    }); 
    app.find('$sender-number').on('keyup',function(){
        var value=Prepare(this).getValue();
        if(value=='' || count(value)<11 || notNumbers(value)){
            Prepare(this).setError();
        }else{
            Prepare(this).removeError();
        }
    }); 
    app.find('$sender-email').on('keyup',function(){
        var value=Prepare(this).getValue();
        if(value=='' || notMail(value)){
            Prepare(this).setError();
        }else{
            Prepare(this).removeError();
        }
    });
    
    app.find('$sendMessage-trigger').on('click',function(){
         
        var inName=Prepare('$sender-name'), 
            inEmail=Prepare('$sender-email'),
            inMobile=Prepare('$sender-number'),
            inMessage=Prepare('$message'),
            name=inName.getValue(), 
            email=inEmail.getValue(),
            mobile=inMobile.getValue(),
            message=inMessage.getValue(),
            controller=Prepare(this);
        
        if(name==''){
            inName.setError();
        }else{
            inName.removeError();
        }
        if(email=='' || notMail(email)){
            inEmail.setError();
        }else{
            inEmail.removeError();
        }
        if(mobile=='' || notNumbers(mobile) || count(mobile)<11){
            inMobile.setError();
        }else{
            inMobile.removeError();
        }
        if(message=='' && message.length<=3){
            inMessage.setError();
        }else{
            inMessage.removeError();
        }
        
        if(name!='' && email!='' && isMail(email) && mobile!='' && isNumbers(mobile) && count(mobile)>10 && message!='' && message.length>3){
            
            new Evironment(controller).setProgress('Sending...');
            var  httpReq=new ayralHttpRequest('POST',hostname+'/server/app.messaging-module.php?request=MESSAGE&id='+session,'default',true);
            httpReq.execute(function(response){
            if(response!=='progress'){
               try{
                    var result=response.target.responseText;
                    new Evironment(controller).revokeProgress('Send Message');
                   
                     if(result.match(/success/)){
                         inMessage.clear();
                         inMessage.setValue('');
                         inMessage.setText('');
                         successAlert('Klassy Mall','Message Sent');
                     }else{
                        alert('Message not Sent:'+result);
                     }
                   }catch(error){
                        print(error);
                        controller.setHtml('Try Again');
                        errorAlert('Connection failed !');  
                    } 
                }
             });
        }
        
    });
    
});