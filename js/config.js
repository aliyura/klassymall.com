var initialLocation=storage.getItem('location'),
    hostname= 'http://localhost/projects/klassymall.com/app/',
   // hostname= 'https://klassymall.com/app',
    session=storage.getItem('session'), 
    sessionExist=false,
    info=storage.getItem('info'),
    user=JSON.parse(info),
    actionContent='Button',
    loader=`
    <!--loader !-->
     <div class="loader loader--style2 activityLoader" title="1">
       <svg version="1.1" id="loader-1"  x="0px" y="0px"
          width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
       <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
         <animateTransform attributeType="xml"
           attributeName="transform"
           type="rotate"
           from="0 25 25"
           to="360 25 25"
           dur="0.6s"
           repeatCount="indefinite"/>
         </path>
       </svg>
     </div>`;
//prepare session 
if(session!='0' && session!=0 && session!=='' && session!==null && session!=='null' && session.length>5){
    sessionExist=true;
}else{
    sessionExist=false;
}
function onMapError(e){
  Prepare(e).setStyle('background', 'images/no_sample_preview.jpg');
}
function onImageError(e){
  Prepare(e).setAttribute('src', 'images/no_sample_preview.jpg');
}
function profilePhotoError(e){
  Prepare(e).setAttribute('src', 'images/avatar.jpg');
}
function onBannerError(e){
  Prepare(e).setAttribute('src', 'images/banner.jpg');
}

//#Environment Setup
function Evironment(controller){

    this.setProgress=function(content){
        if(typeof content != typeof undefined && content!='' && content!=null){
          actionContent=content;
        }else{
           actionContent=controller.getHtml();
        }
        controller.setHtml('<img src="images/loader.gif" class="btn-loader">'+actionContent);
        controller.setAttribute('disabled','true');
    } 
    this.revokeProgress=function(content){
        if(typeof content != typeof undefined && content!='' && content!=null){
          actionContent=content;
        }
        controller.setHtml(actionContent);
        controller.removeAttribute('disabled');
    }
}

function warn(warnning){
    app.find('.warnningAlert').setHtml(warnning);
    app.find('.warnningAlert').show();
    setTimeout(function(){
        app.find('.warnningAlert').hide();
    },10000);
}
function notify(success){
    app.find('.successAlert').setHtml(success);
    app.find('.successAlert').show();
    setTimeout(function(){
        app.find('.successAlert').hide();
    },10000);
}
function closeAlert(){
 if(ayralWindow.document.querySelector('.ja_wrap')){
    ayralWindow.document.querySelector('.ja_wrap').outerHTML='';
 }
}
function revokeProgress(){
 if(ayralWindow.document.querySelector('.ja_wrap')){
    ayralWindow.document.querySelector('.ja_wrap').outerHTML='';
 }
}
function blockProgress(){
 imageAlert('images/loader.gif','30');
 app.find('.ja_close').hide(); 
 app.find('.jAlert').hide();          
}
function redirectToPreview(item){
    var item=storage.getItem('product_'+item);
    if(item!='' && item!=null && item!='null'){
       storage.setItem('preview',item);
       item=JSON.parse(item);
       app.render('preview?id='+item.id); 
    }
}
function searchProduct(e){
    var req=$('.search-in').val();
    if(req!='' && req.toString().length>2){
        app.render('products?search='+req);
    }else{
        $('.search-in').focus();
    }
}
function refreshCartCounts(){
  var cartPayable=Prepare('$cartTotalPayable'),
      cartCounter=Prepare('$cartCounter'),
      tmpPayable=0,payable=0;
   
    if(sessionExist){
         var httpReq=new ayralHttpRequest('GET',hostname+'/server/ui/app.cart-ui.php?request=TOTAL&id='+session,'default',true);   
         httpReq.execute(function(response){
            if(response!='progress'){
                var result=response.target.responseText;
                if(result.toString().match(/success:/)){
                    var obj=result.substr(result.indexOf(':')+1,result.length),
                        cart=JSON.parse(obj);

                        payable=Number(cart.total);
                        cartPayable.setAttribute('ABSPayable',payable);
                        payable=app.toMoney(payable);
                        cartPayable.render('₦'+payable);
                        cartCounter.render(cart.count);
                        storage.setItem('cartNotification',JSON.stringify(cart));

                }else{
                  cartPayable.render('₦ 0.00');
                  cartCounter.render('0');
                } 
            }
         });
    }
}
refreshCartCounts();