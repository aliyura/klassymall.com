<?php
include('app/server/AppController.php');
include('app/server/app.config.php');
$app=new Application();

$pageTitle='Latest Products';
$search='1';
$searchVal='';
   if(isset($_GET['search'])){
       $pageTitle=ucwords(strtolower($_GET['search'].' in KLassy Mall '));
       $search=$_GET['search'];
       $searchVal=$search;
   }
?>