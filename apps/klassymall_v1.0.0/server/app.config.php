<?php
    header("Access-Control-Allow-Origin: *");
    $hostname= 'https://www.klassymall.com/apps/klassymall_v1.0.0';
    $con= @new mysqli('160.153.156.33','klassymall_app','APP.klassymall@1994','klassymall_app');  
    //$hostname= 'http://rabsdeveloper.apps:100/projects/klassymall.com/app%20v1.0';
   // $con= @new mysqli('localhost','root','','klassymall_app');
    $co=$con;
    if(!$con){
     $con=0;
    }else{
     $con=1;
    }
?>




