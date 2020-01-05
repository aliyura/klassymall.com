<?php
include('AppController.php');
include('app.config.php');
$app=new Application();

if($con){
$request=$app->upper(($_GET['request']));
$uid=$app->real($_GET['id']);
if($request=='ORDER'){
    
     $method=$app->real($_GET['method']);
     $itemid=$app->real($_GET['itemid']); 
     $contity=$app->real($_GET['contity']);
     $name=$app->real($_POST['o-prepared-name']);
     $address1=$app->real($_POST['o-prepared-address1']);
     $address2=$app->real($_POST['o-prepared-address2']);
     $number=$app->real($_POST['o-prepared-number']); 
     $description=$app->real(htmlspecialchars($_POST['o-prepared-description']));
     $orderId=uniqid();
     $orderPid=date('smi');
     $owner_id='null';
    
    if($name!='' && $address1!=''){
        
         $getOwner=$app->find("{upload_id='$itemid'}",'s_items');
         if($app->rows($getOwner)>0){      
               if($row=$app->fetch($getOwner)){ 
                  $owner_id=$row['ID'];  

                $res=$app->add("
                {
                  id='$uid',
                  item_id='$itemid',
                  owner_id='$owner_id', 
                  order_id='$orderId', 
                  order_pid='$orderPid',
                  name='$name',
                  address_line1='$address1',
                  address_line2='$address2',
                  alternative_number='$number',
                  description='$description',
                  payment_method='$method',
                  contity='$contity',
                  status='PM',
                  status_reason='Pending Modification',
                  status_type='D'
                }",'s_orders');     
                if($res==1){
                    
                     $orderInfo=mysqli_query($con,"SELECT * FROM s_users u, s_orders o, s_items i WHERE u.ID=o.OWNER_ID and i.UPLOAD_ID=o.ITEM_ID and o.ORDER_ID='$orderId'");
                     if($app->count($orderInfo)>0){
                        if($row=$app->fetch($orderInfo)){
                            $ownerName=$app->abs($app->capitalize($row['NAME']));  
                            $ownerMobile=$app->abs($app->capitalize($row['MOBILE_NUMBER']));
                            $itemName=$app->abs($app->capitalize($row['ITEM_NAME']));  
        
                              $userInfo=$app->find("{id='$uid'}",'s_users');
                              if($app->count($userInfo)>0){
                                 if($row=$app->fetch($userInfo)){
                                     $senderName=$app->abs($app->capitalize($row['NAME']));  
                                     $senderMobile=$app->abs($app->capitalize($row['MOBILE_NUMBER']));
                                   
                                     //send order details  to sender
                                     $app->sendSMS($senderMobile,'Dear '.$senderName.', your order id for '.$itemName.' is '.order_pid.', we will get back to you soon as posible.  Contact us via +2348000000000 for more information.'); 
                                    
                                     //send order request  to owner
                                     $app->sendSMS($ownerMobile,'Dear '.$ownerName.', you have a new order for '.$itemName.' from '.$senderName.' with id '.order_pid.', kindly action to the order now and revert to the customer via '.$senderMobile.'. Thank you.');

                                 }
                              }
                         }
                     }
                    echo('success');

                }else{
                    $response='Unable to make this order '.$res;
                    echo($response);
                }
             }
         }else{
             echo('This item is no longer available');
         }
     }
  } 
  else if($request=='CONTROL'){
    
     $orderid=$app->real($_GET['orderid']);
     $action=$app->real($_GET['action']);
     $lastModifyDate=date('Y-m-d H:i:s');
     $newOrderStatus='PM'; 
     $statusReason='Pending Modification';
     
      switch($app->upper($action)){
         case 'CANCEL':
             $newOrderStatus='OC';
             $statusReason='Order has been Canceled by '.$uid;
         break; 
         case 'EXPLORE':
             $newOrderStatus='OE';
             $statusReason='Order has been Explored by '.$uid;
         break; 
         case 'REJECT':
             $newOrderStatus='OR';
             $statusReason='Order has been Rejected by '.$uid;
         break; 
         case 'APROVE':
             $newOrderStatus='OA';
             $statusReason='Order has been Aproved by '.$uid;
         break; 
         case 'APROVED-CLOSURE':
             $newOrderStatus='AC';
             $statusReason='Order has been Completed and colsed by '.$uid;
         break; 
         case 'REJECTED-CLOSURE':
             $newOrderStatus='RC';
             $statusReason='Order rejected by sender and  Closed by '.$uid;
         break;
         case 'CANCELED-CLOSURE':
             $newOrderStatus='CC';
             $statusReason='Order canceled by sender and  Closed by '.$uid;
         break;
          case 'FINAL-CLOSURE':
             $newOrderStatus='FC';
             $statusReason='Order finnaly closed by '.$uid;
         break;
         default:
            $newOrderStatus='PM';
            $statusReason='Pending Modification';
         break;    
      }

       $updateOrder=$app->update("{
       status='$newOrderStatus', 
       status_reason='$statusReason',
       last_modified_date='$lastModifyDate' ?=@ order_id='$orderid' and (id='$uid' or owner_id='$uid')}",'s_orders');  
       if($updateOrder==1){  
           

            if($newOrderStatus=='OA' or $newOrderStatus=='OR' or $newOrderStatus=='OC'){ //get order details 

               $orderInfo=mysqli_query($con,"SELECT * FROM S_ITEMS I, S_ORDERS O WHERE I.UPLOAD_ID=O.ITEM_ID AND O.ORDER_ID='$orderid'");
               if($app->count($orderInfo)>0){
                  if($row=$app->fetch($orderInfo)){
           
                     $ownerId=$row['OWNER_ID']; 
                     $senderId=$row['ID'];
                     $order_pid=$row['ORDER_PID']; 
                     $item_name=$row['ITEM_NAME'];
                
                       if($newOrderStatus=='OA'){ //send aproval message to sender
                         $userInfo=$app->find("{id='$senderId'}",'s_users');
                         if($app->count($userInfo)>0){
                           if($row=$app->fetch($userInfo)){
                                    $ownerName=$app->abs($app->capitalize($row['NAME']));  
                                    $ownerMobile=$app->abs($app->capitalize($row['MOBILE_NUMBER']));
                                    
                                     $userInfo=$app->find("{id='$senderId'}",'s_users');
                                     if($app->count($userInfo)>0){
                                        if($row=$app->fetch($userInfo)){
                                            $senderName=$app->abs($app->capitalize($row['NAME']));  
                                            $senderMobile=$app->abs($app->capitalize($row['MOBILE_NUMBER']));
                                  
                                          $app->sendSMS($user_mobile,'Dear '.$senderName.', Your order for '.$item_name.' with id '.$order_pid.' has been Aproved by '.$ownerName.'.  Contact us via +2348000000000 for more information.');
                                        }
                                     }
                                }
                          }
                       }    
                       if($newOrderStatus=='OR'){ //send rejection message to sender
                            $userInfo=$app->find("{id='$ownerId'}",'s_users');
                             if($app->count($userInfo)>0){
                               if($row=$app->fetch($userInfo)){
                                    $ownerName=$app->abs($app->capitalize($row['NAME']));  
                                    $ownerMobile=$app->abs($app->capitalize($row['MOBILE_NUMBER']));
                                    
                                     $userInfo=$app->find("{id='$senderId'}",'s_users');
                                     if($app->count($userInfo)>0){
                                        if($row=$app->fetch($userInfo)){
                                            $senderName=$app->abs($app->capitalize($row['NAME']));  
                                            $senderMobile=$app->abs($app->capitalize($row['MOBILE_NUMBER']));
                                   
                                           $app->sendSMS($user_mobile,'Dear '.$senderName.', Your order for '.$item_name.' with id '.$order_pid.' has been Rejected by '.$ownerName.'. Contact us via +2348000000000 for more information.');
                                        }
                                     }
                                }
                             }
                       }  
                       if($newOrderStatus=='OC'){ //send cancelation message to owner
                            $userInfo=$app->find("{id='$ownerId'}",'s_users');
                             if($app->count($userInfo)>0){
                                if($row=$app->fetch($userInfo)){
                                    $ownerName=$app->abs($app->capitalize($row['NAME']));  
                                    $ownerMobile=$app->abs($app->capitalize($row['MOBILE_NUMBER']));
                                    
                                     $userInfo=$app->find("{id='$senderId'}",'s_users');
                                     if($app->count($userInfo)>0){
                                        if($row=$app->fetch($userInfo)){
                                            $senderName=$app->abs($app->capitalize($row['NAME']));  
                                            $senderMobile=$app->abs($app->capitalize($row['MOBILE_NUMBER']));
                                    
                                            $app->sendSMS($user_mobile,'Dear '.$ownerName.', Order for '.$item_name.' with id '.$order_pid.' has been canceled  by '.$senderName.'. Contact us via +2348000000000 for more information.');
                                        }
                                     }
                                }
                             }
                       }  
                  }
               }    
            }
          echo($newOrderStatus.'_success');
       }else{
         $response='Unable to make this order '.$updateOrder;
         echo($response);
       }  
      
  }
  else{
     //Request with no Params.
      echo('Unknown Request !');
  }
}
else{
    echo('connection_failed');
}
?>