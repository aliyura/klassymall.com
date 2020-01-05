<?php
include('AppController.php');
include('app.config.php');
$app=new Application();

if($con){
$request=$app->upper(($_GET['request']));
$uid=$app->abs(($_GET['id']));
    
   if($request=='COMPLAIN'){
     
      $subject=$app->real($_POST['co-subject']);
      $complain=$app->real($_POST['co-description']);

          $update=$app->add("{
          id='$uid',
          subject='$subject',
          complain='$complain'
          }",'s_complains');
          if($update==1){
              echo('success');
          }else{
           $response='Unabl to send  your Complain !'.mysqli_error($con);
           echo($response);
          }
    }
    else if($request=='REPORT'){
     
      $username=$app->real($_POST['re-username']);
      $userid=$app->real($_POST['re-userid']);
      $subject=$app->real($_POST['re-subject']);
      $description=$app->real($_POST['re-description']);

          $update=$app->add("{
          id='$uid',
          reported_pid='$userid',
          reported_username='$username',
          subject='$subject',
          description='$description'
          }",'s_reports');
          if($update==1){
              echo('success');
          }else{
           $response='Unabl to send  your Complain !'.mysqli_error($con);
           echo($response);
          }
    }
 }
else{
    echo('connection_failed');
}
?>