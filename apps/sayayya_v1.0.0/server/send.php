<?php
include('AppController.php');
include('app.config.php');
$app=new Application();

$res=$app->sendSMS('+2348064160204','345678');

?>