<?php
include('../app.config.php');
include('../AppController.php');
include('../date_generator.php');
$app=new Application();
if($con){
    
$request=trim($app->real(($_GET['request'])));
$uid=$app->real($_GET['id']);
$shippingCode='null';
$shippingFee='null';

   $cartItems=$app->find("{owner_id='$uid' order by date desc}",'s_cart');  
   if($app->rows($cartItems)>0){     
       
         while($row=$app->fetch($cartItems)){

              $cart_id=$app->abs($row['ID']); 
              $owner_id=$app->abs($row['OWNER_ID']); 
              $item_id=$app->abs($row['ITEM_ID']); 
              $contity=intval($app->abs($row['CONTITY'])); 
              $color=$app->abs($app->capitalize($row['COLOR']));
              $size=$app->abs($row['SIZE']); 
              $shippingCode=$app->abs($row['SHIPPING_AREA']); 
              $shippingFee=$app->abs($row['SHIPPING_FEE']); 
              $total=0;
             
             
              $itemDetails=$app->find("{upload_id='$item_id'}",'s_items');
              if($app->rows($itemDetails)>0){     
                  
                  if($get=$app->fetch($itemDetails)){
                      
                        $item_owner_id=$app->abs($row['ID']); 
                        $item_name=$app->abs($app->capitalize($get['ITEM_NAME']));
                        $item_price=$app->abs($app->capitalize($get['PRICE']));
                        $item_condition=$app->abs($app->capitalize($get['ITEM_CONDITION']));
                        $item_colors=$app->abs($get['COLORS']); 
                        $item_sizes=$app->abs($get['SIZES']); 
                        $item_discount=intval($app->abs($get['DISCOUNT']));
                        $sample=$app->abs($get['SAMPLE_1']);
                        $samplesDir=$hostname.'/samples/'.$item_owner_id.'/';
                        $oldPrice=$newPrice=0;

                      if($item_discount=='0' or $item_discount==0 or $item_discount=='' or $item_discount=='None' ){
                          $oldPrice=$item_price;
                          $newPrice=$item_price;
                      }else{
                           $oldPrice=$item_price;
                           $newPrice=round($item_price*((100-$item_discount)/100),2);
                      }
                      $total=number_format($newPrice*$contity);
                      $newPrice=number_format($newPrice);
                      
                      //get shipping detaills
                      $deliveryDetails=$app->find("{location_code='$shippingCode'}",'s_fees');
                      if($app->count($deliveryDetails)>0){
                         if($have=$app->fetch($deliveryDetails)){
                             
                             $shippingFee=$app->abs($have['DELIVERY_FEE']);
                             $shippingCode=$app->abs($have['LOCATION_CODE']);
                             $shippingArea=$app->abs($have['LOCATION_DESC']);
                          }
                       }else{
                          //if no location selected
                           $shippingFee='null';
                           $shippingCode='null';
                           $shippingArea='null';
                       }
                      
        
                       $result='{
                       "id":"'.$cart_id.'",
                       "owner_id":"'.$owner_id.'", 
                       "item_id":"'.$item_id.'", 
                       "name":"'.$item_name.'", 
                       "price":"'.$newPrice.'",
                       "total":"'.$total.'", 
                       "contity":"'.$contity.'", 
                       "selected_color":"'.$color.'", 
                       "selected_size":"'.$size.'",  
                       "shipping_code":"'.$shippingCode.'",  
                       "shipping_area":"'.$shippingArea.'", 
                       "shipping_fee":"'.$shippingFee.'",
                       "sample":"'.$samplesDir.$sample.'"
                       },';

                      echo($result);   
                  }
                  
              }else{
                  echo('not_found_1ujd');  
              }
        } 
   }else{ 
     echo('not_found');    
   }        
}
else{
    echo('connection_failed');
}
?>