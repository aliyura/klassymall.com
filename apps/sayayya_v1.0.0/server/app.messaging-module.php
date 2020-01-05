<?php
include('AppController.php');
include('app.config.php');
$app=new Application();

if($con){
$receiver=$app->real($_GET['receiver']);
$topic=$app->real($_GET['topic']);
$to=$app->real($_GET['to']);
$uid=$app->real($_GET['id']);

   $name=$app->real($_POST['preview-mName']);
   $subject=$app->real($_POST['preview-mSubject']);
   $body=$app->real($_POST['preview-mBody']);  
    
    if($name!='' and $subject!='' and $body!=''){
            
           $res=$app->add("
              {
                sender_id='$uid',
                receiver_id='$receiver',
                item_id='$topic',
                subject='$subject',
                name='$name',
                body='$body'
              }",'s_messages');
    
            if($res==1){  
                //broadcast mail and sms here
               $userInfo=$app->find("{id='$uid'}",'s_users');
               if($app->count($userInfo)>0){
                  if($row=$app->fetch($userInfo)){
                      $senderName=$app->abs($app->capitalize($row['NAME']));  
                      $senderMobile=$app->abs($app->capitalize($row['MOBILE_NUMBER']));

                       $userInfo=$app->find("{id='$receiver'}",'s_users');
                       if($app->count($userInfo)>0){
                          if($row=$app->fetch($userInfo)){
                              $receiverName=$app->abs($app->capitalize($row['NAME']));  
                              $receiverMobile=$app->abs($app->capitalize($row['MOBILE_NUMBER']));

                               $itemInfo=$app->find("{upload_id='$topic'}",'s_items');
                               if($app->count($itemInfo)>0){
                                  if($row=$app->fetch($itemInfo)){
                                      $itemName=$app->abs($app->capitalize($row['ITEM_NAME']));  

                                     $app->sendSMS($receiverMobile,'Dear '.$receiverName.', you have new message for '.$itemName.' from '.$senderName.'.  -> "'.$body.'".');
                                  }
                               }
                          }
                       }
                  }
               }
              echo('success');

            }else{
                $response='Unabl to send '.$res;
                echo($response);
            }
    }
}
else{
    echo('connection_failed');
}
?>