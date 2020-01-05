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
            $item_description=$app->abs($app->capitalize($row['DESCRIPTION']));  
            $item_colors=$app->abs($row['COLORS']); 
            $item_sizes=$app->abs($row['SIZES']); 
            $item_gender=$app->abs($app->capitalize($row['GENDER']));
            $item_target=$app->abs($app->capitalize($row['TARGET'])); 
            $item_warranty=$app->abs($app->capitalize($row['WARRANTY'])); 
            $item_discount=intval($app->abs($row['DISCOUNT']));
            $item_quantity=$app->abs($app->upper($row['QUANTITY']));
            $item_owner_id=$app->abs($row['ID']); 
            $item_upload_id=$app->abs($row['UPLOAD_ID']);
            $myday = new DateTime($item_published_date);
            $date_ago= $myday->format('Y-m-d H:i:s');
            $daysAgo=time_elapsed_string($date_ago);
            $sample=$app->abs($row['SAMPLE_1']);
            $samplesDir=$hostname.'/samples/'.$item_owner_id.'/';
            $itemsSamples=array($app->abs($row['SAMPLE_1']),$app->abs($row['SAMPLE_2']),
                                $app->abs($row['SAMPLE_2']),$app->abs($row['SAMPLE_3']),
                                $app->abs($row['SAMPLE_4']),$app->abs($row['SAMPLE_5']),
                                $app->abs($row['SAMPLE_6']),$app->abs($row['SAMPLE_7']),
                                $app->abs($row['SAMPLE_8']));
            $item_name=substr($item_name,0,50);
            $oldPrice=$newPrice=0;
        
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
                    $user_description=$app->abs($app->capitalize($get['DESCRIPTION']));
                }
             }
             
             for($i=0; $i<count($itemsSamples); $i++){
                  if($itemsSamples[$i]!=='' and $itemsSamples[$i]!==null && $itemsSamples[$i]!='not_set'){
                    $samples=$samples.'"sample'.$i.'": "'.$samplesDir.$itemsSamples[$i].'",';
                  }
              }
               
               
             $samples=trim($samples);
             if(substr($samples, -1, 1) == ','){
               $samples = substr($samples, 0, -1);
             }
               
            if($item_discount=='0' or $item_discount==0 or $item_discount=='' or $item_discount=='None' ){
                $oldPrice=$item_price;
                $newPrice=$item_price;
             }else{
                 $oldPrice=$item_price;
                 $newPrice=round($item_price*((100-$item_discount)/100),2);
             }
             echo('
             {
             "id": "'.$item_upload_id.'",
             "name": "'.$item_name.'",
             "price": "'.number_format($item_price).'", 
             "oldPrice": "'.number_format($oldPrice).'", 
             "newPrice": "'.number_format($newPrice).'", 
             "category": "'.$item_category.'",
             "location": "'.$item_location.'",
             "condition": "'.$item_condition.'",
             "description": "'.$item_description.'",
             "colors": "'.$item_colors.'",
             "sizes": "'.$item_sizes.'",
             "gender": "'.$item_gender.'",
             "target": "'.$item_target.'",
             "warranty": "'.$item_warranty.'",
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