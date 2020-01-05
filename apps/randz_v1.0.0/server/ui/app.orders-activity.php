<?php
include('../app.config.php');
include('../AppController.php');
include('../date_generator.php');
$app=new Application();

if($con){
$request=trim($app->real(($_GET['request'])));
$type=trim($app->real(($_GET['type'])));
$resultSet=$app->lower($type);
$uid=$app->real($_GET['id']);

     switch($type){
         case 1:$type='N'; break; 
         case 2:$type='D'; break; 
         case 3:$type='H'; break;
         default: $type='O'; break;
     }

    if($type=='N' and $resultSet==1){
       $OrderDetails=$app->find("{owner_id='$uid' and (status ='OA' or status ='PM' or status ='OR') order by LAST_MODIFIED_DATE desc limit 25}",'s_orders'); 
    }
    if($type=='D' and $resultSet==2){
       $OrderDetails=$app->find("{id='$uid' and (status ='PM' or status ='OA' or status ='OR' or status ='OC') order by LAST_MODIFIED_DATE desc limit 25}",'s_orders'); 
    }
    if($type=='H' and $resultSet==3){
       $OrderDetails=$app->find("{(id='$uid' or owner_id='$uid') and (status ='PM' or status ='OA' or status ='OR' or status ='OC' or status ='AC')  order by LAST_MODIFIED_DATE desc limit 25}",'s_orders');    
    }

     if($app->rows($OrderDetails)>0){         
    
         $sender_name=$sender_email=$sender_mobile=$sender_address=$sender_category=$sender_pid=$sender_description=''; $sender_name=$sender_email=$sender_mobile=$sender_address=$sender_category=$sender_pid=$sender_description='';
        $item_name=$item_category=$item_location=$item_price=$item_condition=$item_description=''; $item_quantity=$item_owner_id=$item_upload_id=$sample=$samplesDir=''; 
        $orderCount=1;
        $orderDescription='';
          
        while($row=$app->fetch($OrderDetails)){
            
            $order_name=$app->abs($app->capitalize($row['NAME']));
            $sender_id=$app->abs($app->lower($row['ID']));
            $order_ownerid=$app->abs($app->lower($row['OWNER_ID']));
            $order_id=$app->abs($app->lower($row['ORDER_ID'])); 
            $order_pid=$app->abs($app->lower($row['ORDER_PID'])); 
            $order_item_id=$app->abs($app->lower($row['ITEM_ID']));
            $order_contity=$app->abs($app->lower($row['CONTITY']));
            $order_date=$app->abs($app->capitalize($row['DATE']));
            $order_address1=$app->abs($app->capitalize($row['ADDRESS_LINE1']));  
            $order_address2=$app->abs($app->capitalize($row['ADDRESS_LINE2']));
            $order_alternative_number=$app->abs($app->capitalize($row['ALTERNATIVE_NUMBER']));
            $order_description=$app->abs($app->capitalize($row['DESCRIPTION']));
            $order_payment_method=$app->abs($app->upper($row['PAYMENT_METHOD']));
            $order_status=$app->abs($app->upper($row['STATUS']));
            $order_status_type=$app->abs($app->upper($row['STATUS_TYPE']));
            $myday = new DateTime($order_date);
            $date_ago= $myday->format('Y-m-d H:i:s');
            $daysAgo=time_elapsed_string($date_ago);
        
             $ItemDetails=$app->find("{upload_id='$order_item_id'}",'s_items');
             if($app->rows($ItemDetails)>0){     
                if($get=$app->fetch($ItemDetails)){
    
                    $item_name=$app->abs($app->capitalize($get['ITEM_NAME']));
                    $item_category=$app->abs($app->capitalize($get['CATEGORY']));
                    $item_location=$app->abs($app->capitalize($get['LOCATION']));
                    $item_price=$app->abs($app->capitalize($get['PRICE']));
                    $item_published_date=$app->abs($app->capitalize($get['DATE']));
                    $item_condition=$app->abs($app->capitalize($get['ITEM_CONDITION']));
                    $item_description=$app->abs($app->capitalize($get['DESCRIPTION'])); 
                    $item_quantity=$app->abs($app->upper($get['QUANTITY']));
                    $item_owner_id=$app->abs($get['ID']); 
                    $item_upload_id=$app->abs($get['UPLOAD_ID']);
                    $sample=$app->abs($get['SAMPLE_1']);
                    $sample=$hostname.'/samples/'.$item_owner_id.'/'.$sample;
                    if(strpos($item_price,'.')>0){
                      $item_price=substr($item_price,0,strpos($item_price,'.'));
                    }

                }
             }
             $SenderDetails=$app->find("{id='$sender_id'}",'s_users');
             if($app->rows($SenderDetails)>0){     
                if($get=$app->fetch($SenderDetails)){
                    $sender_id=$app->abs($app->lower($get['ID']));
                    $sender_name=$app->abs($app->capitalize($get['NAME'])); 
                    $sender_email=$app->abs($app->capitalize($get['EMAIL_ADDRESS'])); 
                    $sender_city=$app->abs($app->capitalize($get['CITY']));
                    $sender_mobile=$app->abs($app->capitalize($get['MOBILE_NUMBER'])); 
                    $sender_address=$app->abs($app->capitalize($get['ADDRESS']));
                    $sender_category=$app->abs($app->capitalize($get['CATEGORY'])); 
                    $sender_pid=$app->abs($app->capitalize($get['PID']));
                    $sender_dp=$app->abs($get['DP']);

                }
             }
             $OwnerDetails=$app->find("{id='$item_owner_id'}",'s_users');
             if($app->rows($OwnerDetails)>0){     
                if($get=$app->fetch($OwnerDetails)){
                    $owner_id=$app->abs($app->lower($get['ID'])); 
                    $owner_name=$app->abs($app->capitalize($get['NAME'])); 
                    $owner_city=$app->abs($app->capitalize($get['CITY']));
                    $owner_email=$app->abs($app->capitalize($get['EMAIL_ADDRESS']));
                    $owner_mobile=$app->abs($app->capitalize($get['MOBILE_NUMBER'])); 
                    $owner_address=$app->abs($app->capitalize($get['ADDRESS']));
                    $owner_category=$app->abs($app->capitalize($get['CATEGORY'])); 
                    $owner_pid=$app->abs($app->capitalize($get['PID']));
                    $owner_dp=$app->abs($get['DP']);
                }
             }
            
            if($sender_id==$uid){
               $sender_name='You';
               $orderDescription='Address: <b>'.$order_address1.'</b>, You placed this order '.$daysAgo.', '.$owner_name.' will be contacting you via <b>'.$sender_mobile.'</b>.';
            }else{
               $orderDescription=$sender_name.' placed this order '.$daysAgo.', please contact them via <b>'.$sender_mobile.'</b>, order address <b>'.$order_address1.'</b>.';
            }
            
        
            echo('
             {
                 "id": "'.$order_id.'",
                 "pid": "'.$order_pid.'",
                 "order_owner_id": "'.$order_ownerid.'",
                 "order_item_id": "'.$order_item_id.'", 
                 "order_address1": "'.$order_address1.'",
                 "order_address2": "'.$order_address2.'", 
                 "order_description": "'.$orderDescription.'",
                 "order_payment_method": "'.$order_payment_method.'",
                 "order_contity": "'.$order_contity.'",
                 "status": "'.$order_status.'",
                 "order_type": "'.$type.'",
                 "date": "'.$daysAgo.'",
                 "rows": "'.number_format($app->rows($OrderDetails)).'",
                 "item":{
                    "id":"'.$item_upload_id.'",
                    "name":"'.$item_name.'",  
                    "price":"'.number_format(($item_price*$order_contity)).'",
                    "condition":"'.$item_condition.'", 
                    "description":"'.$item_description.'",
                    "owner_id":"'.$item_owner_id.'",
                    "sample":"'.$sample.'"
                 },
                 "sender":{
                    "id":"'.$sender_id.'",
                    "pid":"'.$sender_pid.'",
                    "name":"'.$sender_name.'", 
                    "city":"'.$sender_city.'",  
                    "email":"'.$sender_email.'",
                    "mobile":"'.$sender_mobile.'", 
                    "address":"'.$sender_address.'",
                    "category":"'.$sender_category.'",
                    "dp":"'.$sender_dp.'"
                 },
                 "owner":{
                    "id":"'.$owner_id.'",
                    "pid":"'.$owner_pid.'",
                    "name":"'.$owner_name.'",   
                    "city":"'.$owner_city.'",  
                    "email":"'.$owner_email.'",
                    "mobile":"'.$owner_mobile.'", 
                    "address":"'.$owner_address.'",
                    "category":"'.$owner_category.'",
                    "dp":"'.$owner_dp.'"
                 }
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