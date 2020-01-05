function reloadAutocomplete(flag){
    
   var auto=new autocompleteManager(),
   category=document.querySelector('#i-category');
    
    if(flag==1){
    
        var url=hostname+'/server/app.autocomplete-module.php?request=002',
            httpReq=new ayralHttpRequest('GET',url,'default',true);
        
          httpReq.execute(function(response){
              if(response!='progress'){
                   try{
                      var result=response.target.responseText;
                      if(result.match(/failed_to_fetch_autocomplete_dump/)){
                            print(result);
                      }else if(result.match(/connection_failed/)){
                            print(result);
                      }else{
                         var autoDump=result.trim().split(',');
                         auto.setAutocomplete(category,autoDump);
                      }
                  }catch(error){
                    print(error);
                  }
               }
           });
     }
}
reloadAutocomplete(1);
