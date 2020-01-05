var ref=window.location.href.toString(),
    today = new Date(),
    dd = today.getDate(),
    mm = today.getMonth()+1, 
    yyyy = today.getFullYear();
if(dd<10){
        dd='0'+dd
} 
if(mm<10){
        mm='0'+mm
} 
today = yyyy+'-'+mm+'-'+dd;
Prepare('$cc-expiry').setAttribute("min", today);

if(ref.match(/ref=/)){
  ref=ref.substr(ref.indexOf('ref')+4,ref.length);
  Prepare('$cc-ref').setValue('#'+ref);
}else{
    app.render('login');
}

successFunction=function(transaction_id) {
      blockProgress();
     var name=user.name,mobile=user.mobile,
         httpReq=new ayralHttpRequest('POST',hostname+'/server/app.payment-module.php?request=PAYMENT-STATUS&id='+session+'&trans='+transaction_id+'&ref='+ref+'&name='+name+'&mobile='+mobile,'default',true);
     httpReq.execute(function(response){
        if(response!='progress'){
           var result=response.target.responseText;
           app.render('payment?status=1&trans='+transaction_id+'&ref='+ref);  
        }
     });
}
closedFunction=function() {
  app.render('payment?status=0');
}
failedFunction=function(transaction_id) {
  app.render('payment?status=2&trans='+transaction_id+'&ref='+ref);
}
function paymentManager(){
    this.init=function(cc_ref,cc_name,cc_number,cc_expire,cc_cvv,cc_amount,memos){
    //Initiate voguepay inline payment
        var reference=app.generateID();
        Voguepay.init({
             v_merchant_id: '9170-0073536',
             total: cc_amount,
             notify_url:'http://domain.com/notification.php',
             cur: 'NGN',
             merchant_ref: reference,
             memo:'Payment for '+memos,
             recurrent: true,
             frequency: 10,
             developer_code: '5a61be72ab323',
             store_id:1,
             customer: {
                 name: cc_name,
                 address: user.address,
                 city: user.city,
                 state: user.city,
                 zipcode: '123455',
                 email: user.email,
                 phone: user.mobile
             },
            closed:closedFunction,
            success:successFunction,
            failed:failedFunction
        });
    }
}

 app.find('input,textarea').on('keyup',function(){
        var value=Prepare(this).getValue();
        if(value==''){
            Prepare(this).setError();
     }else{
         Prepare(this).removeError();
     }
 }); 
 app.find('$cc-number').on('keyup',function(){
     var value=Prepare(this).getValue();
     if(value=='' || count(value)<19 || notNumbers(value)){
         Prepare(this).setError();
     }else{
         Prepare(this).removeError();
     }
     Prepare(this).setValue(value.replace(/[^Z0-9]/g,''));
 });
app.find('$cc-cvv').on('keyup',function(){
     var value=Prepare(this).getValue();
     if(value=='' || count(value)<3 || notNumbers(value)){
         Prepare(this).setError();
     }else{
         Prepare(this).removeError();
     }
     Prepare(this).setValue(value.replace(/[^0-9]/g,''));
 }); 
app.find('$cc-expiry').on('keyup',function(){
     var value=Prepare(this).getValue();
     if(value=='' || count(value)<5){
         Prepare(this).setError();
     }else{
         Prepare(this).removeError();
     }
     Prepare(this).setValue(value.replace(/[^0-9/]/g,''));
 }); 
function addPayment(e){
    var inCCName=Prepare('$cc-name'),
        inCCREF=Prepare('$cc-ref'),
        inCCNumber=Prepare('$cc-number'), 
        inCCExpire=Prepare('$cc-expiry'),
        inCCCVV=Prepare('$cc-cvv'),
        name=inCCName.getValue(),
        ref=inCCREF.getValue(),
        number=inCCNumber.getValue(),
        expire=inCCExpire.getValue(),
        cvv=inCCCVV.getValue(),
        controller=Prepare(e);
    
         if(name=='' || count(name)<3){
            inCCName.setError();
         }else{
            inCCName.removeError(); 
         }if(ref==''){
            inCCREF.setError();
         }else{
            inCCREF.removeError(); 
         }if(number=='' || count(number)<19 || notNumbers(number)){
            inCCNumber.setError();
         }else{
            inCCNumber.removeError(); 
         }if(expire==''){
            inCCExpire.setError();
         }else{
            inCCExpire.removeError(); 
         }if(cvv==''){
            inCCCVV.setError();
         }else{
            inCCCVV.removeError(); 
         }
    
 if(name!='' && count(name)>=3 &&  ref!='' && number!='' && count(number)>=19 && expire!='' &&  cvv!=''){
    
     new Evironment(controller).setProgress('Processing...');
     
     var httpReq=new ayralHttpRequest('POST',hostname+'/server/app.payment-module.php?request=PAY&id='+session,'default',true);   
     httpReq.execute(function(response){
        if(response!='progress'){
           var result=response.target.responseText;
             if(result.match(/success/)){
                 
                 
                 var httpReq=new ayralHttpRequest('GET',hostname+'/server/ui/app.cart-ui.php?request=TOTAL&id='+session,'default',true);   
                     httpReq.execute(function(response){
                        if(response!='progress'){
                            var result=response.target.responseText;
                            if(result.toString().match(/success:/)){
                                var obj=result.substr(result.indexOf(':')+1,result.length),
                                    cart=JSON.parse(obj);
                                
                                 payable=app.toNumber(cart.total);
                                new paymentManager().init(ref,name,number,expire,cvv,payable,cart.name);
                            }else{
                               warningAlert('Unable to process your Payment!');
                            } 
                        }
                     });
                 
             }else{
                 print(result);
                 errorAlert('Oops! We are unable to process your payment!');
             }
        }
     });
 }
   
}
//
