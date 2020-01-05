<?php
    header("Access-Control-Allow-Origin: *");
    //$hostname= 'https://www.klassymall.com/apps/sayayya_v1.0.0';
    //$con= @new mysqli('160.153.156.33','sayayya_app','APP.sayayya@2019','sayayya_db');  
    $hostname= 'http://rabsdeveloper.apps:100/projects/klassymall.com/app%20v1.0';
    $con= @new mysqli('localhost','root','','klassymall_app');
    $co=$con;
    if(!$con){
     $con=0;
    }else{
     $con=1;
    }
?>




