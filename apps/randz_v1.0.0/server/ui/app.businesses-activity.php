<?php
include('../app.config.php');
include('../AppController.php');
include('../date_generator.php');
$app=new Application();
if($con){
    
$request=trim($app->real(($_GET['request'])));
$subRequest=substr($request,0,strlen($request)-1);
$uid=$app->real($_GET['id']);
$location='Nigeria';
$maxRows=2;
$nextRows=0;
$rowTemplate='';
if(isset($_GET['location'])){
    $location=$_GET['location'];
}
if(isset($_GET['next'])){
  $nextRows=$_GET['next'];
  $rowTemplate=' and count<'.($nextRows);
}


      if($request==1){   
          $businesses=$app->find("{status='AC' $rowTemplate and (country like '%$location%' or location like '%$location%' or city like '%$location%') and profile_type='2' and (offer_code='HVC1102' or offer_code='HYVC111') order by CREATED_DATE desc limit $maxRows}",'s_users');
      }else{
        $businesses=$app->find("{status='AC' $rowTemplate and (country like '%$location%' or location like '%$location%' or city like '%$location%') and profile_type='2' and (offer_code='HVC1102' or offer_code='HYVC111') and (name like '%$request%' or name like '%$subRequest%' or username like '%$request%' or username like '%$subRequest%' or mobile_number like '%$request%' or mobile_number like '%$subRequest%' or email_address like '%$request%' or email_address like '%$subRequest%' or category like '%$request%' or category like '%$subRequest%' or address like '%$request%' or address like '%$subRequest%' or city like '%$request%' or city like '%$subRequest%' or pid like '%$request%' or pid like '%$subRequest%' or offer_code like '%$request%' or offer_code like '%$subRequest%') order by CREATED_DATE desc limit $maxRows}",'s_users');
     }
    
     if($app->rows($businesses)>0){     
       
         while($row=$app->fetch($businesses)){

              $business_id=$app->abs($row['ID']); 
              $business_username=$app->abs($row['USERNAME']); 
              $business_offer=$app->abs($row['OFFER_CODE']);  
              $business_name=$app->abs($app->capitalize($row['NAME'])); 
              $business_email=$app->abs($app->capitalize($row['EMAIL_ADDRESS']));
              $business_mobile=$app->abs($app->capitalize($row['MOBILE_NUMBER'])); 
              $business_address=$app->abs($app->capitalize($row['ADDRESS']));
              $business_category=$app->abs($app->capitalize($row['CATEGORY'])); 
              $business_pid=$app->abs($app->capitalize($row['PID']));
              $business_description=$app->abs($app->capitalize($row['DESCRIPTION']));
              $business_DP=$app->abs($row['DP']);
              $rowcount=$app->abs($row['COUNT']);
              $business_esdate=$app->abs($row['DOB']); 
              $business_city=$app->abs($row['CITY']);
              $business_ocFlag=$app->abs($row['OC_FLAG']);
             
             $result='{
               "id":"'.$business_id.'",
               "pid":"'.$business_pid.'", 
               "name":"'.$business_name.'", 
               "email":"'.$business_email.'", 
               "mobile":"'.$business_mobile.'", 
               "esdate":"'.$business_esdate.'", 
               "address":"'.$business_address.'", 
               "description":"'.$business_description.'", 
               "offer":"'.$business_offer.'", 
               "username":"'.$business_username.'", 
               "rownum": "'.$rowcount.'",
               "category":"'.$business_category.'", 
               "profile":"'.$app->capitalize($app->abs($row['PROFILE_TYPE'])).'",
               "dp":"'.$business_DP.'", 
               "oc":"'.$business_ocFlag.'",
               "city":"'.$business_city.'"
               },';
             
             echo($result);   
        } 
     }else{ 
         if($request!=1){
             echo('not_match');    
         }else{
             echo('not_found');  
         }
      
     }        
}
else{
    echo('connection_failed');
}
?>