<?php
include('../app.config.php');
include('../AppController.php');
include('../date_generator.php');
$app=new Application();

if($con){
    
$itemid=trim($app->real(($_GET['itemid'])));
$uid=trim($app->real($_GET['id']));

     $items=$app->find("{UPLOAD_ID='$itemid' AND status='AC' order by date desc limit 1}",'s_items');
     if($app->rows($items)>0){   
              
           if($row=$app->fetch($items)){ 
            $item_name=$app->abs($app->capitalize($row['ITEM_NAME']));
            $item_id=$app->abs($app->capitalize($row['UPLOAD_ID'])); 
            $item_price=$app->abs($app->capitalize($row['PRICE']));
            $owner_id=$app->abs($app->capitalize($row['ID']));
            $abs_Price=($item_price/100*80);
               
            if(strpos($abs_Price,'.')>0){
              $abs_Price=substr($abs_Price,0,strpos($abs_Price,'.'));
            }
    
            $result='success:
            {
             "owner_id":"'.$owner_id.'", 
             "item_id":"'.$item_id.'", 
             "item_name":"'.$item_name.'", 
             "item_price":"'.$abs_Price.'"
             }';
               
            echo('hi'.$result);
        }
         
     }else{ 
       echo('not_found');
     }        
}
else{
    echo('connection_failed');
}
?>