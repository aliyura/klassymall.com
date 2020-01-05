<?php
include('../app.config.php');
include('../AppController.php');
include('../date_generator.php');
$app=new Application();

if($con){
    
$orderid=trim($app->real(($_GET['orderid'])));
$itemid=trim($app->real(($_GET['itemid'])));
$uid=trim($app->real($_GET['id']));
    
    $OrderDetails=$app->find("{order_id='$orderid' order by date desc limit 1}",'s_orders'); 
     if($app->rows($OrderDetails)>0){     
    
        $sender_name=$sender_email=$sender_mobile=$sender_address=$sender_category=$sender_pid=$sender_description='';
        $sender_name=$sender_email=$sender_mobile=$sender_address=$sender_category=$sender_pid=$sender_description='';
        $item_name=$item_category=$item_location=$item_price=$item_condition=$item_description=''; $item_quantity=$item_owner_id=$item_upload_id=$sample=$samplesDir=''; 
        $orderCount=1;
        $orderDescription='';
        $item_description='';
        $samples='';
          
        if($row=$app->fetch($OrderDetails)){
            
            $order_name=$app->abs($app->capitalize($row['NAME']));
            $sender_id=$app->abs($app->lower($row['ID']));
            $order_id=$app->abs($app->lower($row['ORDER_ID']));
            $order_pid=$app->abs($app->lower($row['ORDER_PID'])); 
            $order_item_id=$app->abs($app->lower($row['ITEM_ID']));
            $order_contity=$app->abs($app->lower($row['CONTITY']));
            $order_date=$app->abs($app->capitalize($row['DATE']));
            $order_address1=$app->abs($app->capitalize($row['ADDRESS_LINE1']));  
            $order_address2=$app->abs($app->capitalize($row['ADDRESS_LINE2']));
            $order_alternative_number=$app->abs($app->capitalize($row['ALTERNATIVE_NUMBER']));
            $order_description=nl2br($app->abs($app->capitalize($row['DESCRIPTION'])));
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
                    $item_absName=$item_name;
                    $item_category=$app->abs($app->capitalize($get['CATEGORY']));
                    $item_location=$app->abs($app->capitalize($get['LOCATION']));
                    $item_price=$app->abs($app->capitalize($get['PRICE']));
                    $item_published_date=$app->abs($app->capitalize($get['DATE']));
                    $item_condition=$app->abs($app->capitalize($get['ITEM_CONDITION']));
                    $item_description=nl2br($app->abs($app->capitalize($get['DESCRIPTION']))); 
                    $item_quantity=$app->abs($app->upper($get['QUANTITY']));
                    $item_owner_id=$app->abs($get['ID']); 
                    $item_upload_id=$app->abs($get['UPLOAD_ID']);
                    $myday = new DateTime($item_published_date);
                    $date_ago= $myday->format('Y-m-d H:i:s');
                    $daysAgo=time_elapsed_string($date_ago);
                    $sample=$app->abs($get['SAMPLE_1']);
                    $samplesDir=$hostname.'/samples/'.$item_owner_id.'/';
                    $itemsSamples=array($app->abs($get['SAMPLE_1']),$app->abs($get['SAMPLE_2']),$app->abs($get['SAMPLE_2']),$app->abs($get['SAMPLE_3']),$app->abs($get['SAMPLE_4']),$app->abs($get['SAMPLE_5']),$app->abs($get['SAMPLE_6']),$app->abs($get['SAMPLE_7']),$app->abs($get['SAMPLE_8']));
                    $item_name=substr($item_name,0,50);
                    $abs_Price=($item_price/100*80);
                    if(strpos($abs_Price,'.')>0){
                      $abs_Price=substr($abs_Price,0,strpos($abs_Price,'.'));
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
                    $sender_ptype=$app->abs($app->capitalize($get['PROFILE_TYPE']));
                    $sender_description=nl2br($app->abs($app->capitalize($get['DESCRIPTION'])));
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
                    $owner_ptype=$app->abs($app->capitalize($get['PROFILE_TYPE']));
                    $owner_description=nl2br($app->abs($app->capitalize($get['DESCRIPTION'])));
                    $owner_dp=$app->abs($get['DP']);
                }
             }
            
            if($sender_id==$uid){
               $sender_name='You';
               $orderDescription='Address: <b>'.$order_address1.'</b>, You placed this order '.$daysAgo.', '.$owner_name.' will be contacting you via <b>'.$sender_mobile.'</b>. Explore if received already.';
            }else{
              $orderDescription=$sender_name.' placed this order '.$daysAgo.', please contact them via <b>'.$sender_mobile.'</b>, order address <b>'.$order_address1.'</b>. If its valid, Confirm else Reject.';
            }
            
            if($order_contity>1){
              $item_price=$item_price*$order_contity;           
            }
            
            echo('
             {
                 "id": "'.$order_id.'",
                 "pid": "'.$order_pid.'",
                 "order_item_id": "'.$order_item_id.'", 
                 "order_address1": "'.$order_address1.'",
                 "order_address2": "'.$order_address2.'", 
                 "order_description": "'.$orderDescription.'", 
                 "order_comment": "'.$item_description.'",
                 "order_payment_method": "'.$order_payment_method.'",
                 "order_contity": "'.$order_contity.'",
                 "status": "'.$order_status.'",
                 "status_type": "'.$order_status_type.'",
                 "date": "'.$daysAgo.'",
                 "rows": "'.number_format($app->rows($OrderDetails)).'",
                 "item":{
                    "id":"'.$item_upload_id.'",
                    "name":"'.$item_name.'",  
                    "price":"'.number_format($item_price).'",
                    "condition":"'.$item_condition.'", 
                    "description":"'.$item_description.'",
                    "owner_id":"'.$item_owner_id.'",
                    "sample":{'.$samples.'}
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
                    "profile_type":"'.$sender_ptype.'",
                    "description":"'.$sender_description.'",
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
                    "profile_type":"'.$owner_ptype.'", 
                    "description":"'.$sender_description.'",
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