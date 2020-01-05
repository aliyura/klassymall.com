<?php
include('../app.config.php');
include('../AppController.php');
include('../date_generator.php');
$app=new Application();

if($con){
    
$itemid=trim($app->real(($_GET['itemid'])));
$name=trim($app->real(($_GET['name'])));
$uid=trim($app->real($_GET['id']));

     $items=$app->find("{UPLOAD_ID='$itemid' AND status='AC' order by date desc limit 1}",'s_items');
     if($app->rows($items)>0){   
         
        $user_name='Siyayya';  
        $user_email='order@siyayya.com';
        $user_mobile='+2348000000000';
        $user_pid=''; 
        $samples='';
               
           if($row=$app->fetch($items)){ 
            $item_name=$app->abs($app->capitalize($row['ITEM_NAME']));
            $item_absName=$item_name;
            $item_category=$app->abs($app->capitalize($row['CATEGORY']));
            $item_location=$app->abs($app->capitalize($row['LOCATION']));
            $item_price=$app->abs($app->capitalize($row['PRICE']));
            $item_published_date=$app->abs($app->capitalize($row['DATE']));
            $item_condition=$app->abs($app->capitalize($row['ITEM_CONDITION']));
            $item_description=nl2br($app->abs($app->capitalize($row['DESCRIPTION']))); 
            $item_quantity=$app->abs($app->upper($row['QUANTITY']));
            $item_owner_id=$app->abs($row['ID']); 
            $item_upload_id=$app->abs($row['UPLOAD_ID']);
            $myday = new DateTime($item_published_date);
            $date_ago= $myday->format('Y-m-d H:i:s');
            $daysAgo=time_elapsed_string($date_ago);
            $sample=$app->abs($row['SAMPLE_1']);
            $samplesDir=$hostname.'/samples/'.$item_owner_id.'/';
            $itemsSamples=array($app->abs($row['SAMPLE_1']),$app->abs($row['SAMPLE_2']),$app->abs($row['SAMPLE_2']),$app->abs($row['SAMPLE_3']),$app->abs($row['SAMPLE_4']),$app->abs($row['SAMPLE_5']),$app->abs($row['SAMPLE_6']),$app->abs($row['SAMPLE_7']),$app->abs($row['SAMPLE_8']));
            $item_name=substr($item_name,0,50);
            $abs_Price=($item_price/100*80);
            if(strpos($abs_Price,'.')>0){
              $abs_Price=substr($abs_Price,0,strpos($abs_Price,'.'));
            }
         
            if(strlen($item_name)>50){
                $item_name=$item_name.'...';
            }
       
             $user_info=$app->find("{id='$item_owner_id' order by created_date desc limit 1}",'s_users');
             if($app->count($user_info)>0){
                if($get=$app->fetch($user_info)){
                    
                    $user_name=$app->abs($get['USERNAME']);  
                    $full_name=$app->abs($app->capitalize($get['NAME'])); 
                    $user_email=$app->abs($app->capitalize($get['EMAIL_ADDRESS']));
                    $user_mobile=$app->abs($app->capitalize($get['MOBILE_NUMBER'])); 
                    $user_address=$app->abs($app->capitalize($get['ADDRESS']));
                    $user_category=$app->abs($app->capitalize($get['CATEGORY'])); 
                    $user_pid=$app->abs($app->capitalize($get['PID'])); 
                    $user_ptype=$app->abs($app->capitalize($get['PROFILE_TYPE']));
                    $user_description=nl2br($app->abs($app->capitalize($get['DESCRIPTION'])));
                }
             }
             
             for($i=0; $i<count($itemsSamples); $i++){
                  if($itemsSamples[$i]!=='' and $itemsSamples[$i]!==null && $itemsSamples[$i]!='not_set'){
                    $samples=$samples.'"sample'.$i.'": "'.$samplesDir.$itemsSamples[$i].'",';
                  }
              }
               
               
             $samples=trim($samples);
             if(substr($samples, -1, 1) == ',')
             {
               $samples = substr($samples, 0, -1);
             }
       
             echo('
             {
             "id": "'.$item_upload_id.'",
             "name": "'.$item_name.'",
             "price": "'.number_format($item_price).'", 
             "category": "'.$item_category.'",
             "location": "'.$item_location.'",
             "condition": "'.$item_condition.'",
             "description": "'.$item_description.'",
             "contity": "'.$item_quantity.'", 
             "sample": "'.$samplesDir.$sample.'",
             "date": "'.$daysAgo.'",
             "rows": "'.number_format($app->rows($items)).'",
             "sample":{'.$samples.'},
             "owner_id": "'.$item_owner_id.'",
             "owner_pid": "'.$user_pid.'",
             "owner_name": "'.$full_name.'",   
             "owner_username": "'.$user_name.'",
             "owner_email": "'.$user_email.'", 
             "owner_address": "'.$user_address.'", 
             "owner_category": "'.$user_category.'", 
             "owner_ptype": "'.$user_ptype.'",  
             "owner_description": "'.$user_description.'",
             "owner_mobile": "'.$user_mobile.'"
             },
            ');
        }
         
     }else{ 
       echo('not_found');
     }        
}
else{
    echo('connection_failed');
}
?>