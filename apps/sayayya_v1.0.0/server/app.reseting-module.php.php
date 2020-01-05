<?php
include('AppController.php');
include('app.config.php');
$app=new Application();

if($con){
$request=$app->upper(($_GET['request']));
$uid=$app->real($_GET['id']);

// reset previous unfinish upload items
$res=$app->delete("
{
  id='$uid',
  status='UP',
}",'s_upload_master');
 
}
else{
    echo('connection_failed');
}
?>