<?php
include('AppController.php');
include('app.config.php');
$app=new Application();

if($con){
$request=$app->upper(($_GET['request']));
$itemid=$app->real($_GET['itemid']);
$uid=$app->real($_GET['id']);
// reset previous unfinish upload items
 if($request=='001'){
     //switch
    $state=strtoupper($app->real($_GET['state']));
    $status='AC';
     
    $statusReason='Switch to Enabled';
    if($state=='OFF'){
       $status='AC';
       $statusReason='Switch to Enabled';
    }else{
     $status='IA';
     $statusReason='Switch to Disabled';
    }

     $activate=$app->update("{status='$status',status_reason='$statusReason' ?=@ id='$uid' and upload_id='$itemid'}",'s_items');
     if($activate==1){
          echo('success');
     }else{
       echo('Unabl to  switch '.$state.' this product');
     }
   
 }else if($request=='002'){
      //delete
     $activate=$app->update("{status='ER',status_reason='Erased' ?=@ id='$uid' and upload_id='$itemid'}",'s_items');
     if($activate==1){
          echo('success');
     }else{
       echo('Unabl to delete this product ');
     }
 }
    
}
else{
    echo('connection_failed');
}
?>