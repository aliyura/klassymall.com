<?php
include('AppController.php');
include('app.config.php');
$app=new Application();

if($con){  
    $request=$app->upper($_GET['request']);
    if($request=='ADD'){

        $itemPrice=$app->real($_GET['price']);
        $itemName=$app->real($_GET['name']);
        $itemId=$app->real($_GET['itemid']);
        $contity=$app->real($_GET['contity']);
        $color=$app->real($_GET['color']);
        $size=$app->real($_GET['size']);
        $uid=$app->real($_GET['id']);

        if($itemId!='' and $itemName!='' and $itemPrice!=''){


              $cartID=uniqid();
              $res=$app->add("
              {
                id='$cartID',
                item_id='$itemId', 
                owner_id='$uid', 
                item_name='$itemName',
                item_price='$itemPrice', 
                contity='$contity',
                color='$color', 
                size='$size'
              }",'s_cart');            

            if($res==1){ 
                echo('success');
            }else{
              echo('Failed to add this '.$itemName.' to cart');   
            }
        }
    }
    else if($request=='CONTITY'){
        $contity=intval($_GET['contity']); 
        $id=$_GET['cid'];
        
        if($contity==0 or $contity==''){
            $contity=1;
        }

        $updateContity=$app->update("{contity='$contity' ?=@ id='$id'}",'s_cart');
         if($updateContity==1){
              echo('success');
         }else{
           echo('Unabl to  modify contity of this item');
         }
    } 
    else if($request=='REMOVE'){
        $cid=$_GET['cid']; 
        $removeItem=$app->delete("{id='$cid'}",'s_cart');
         if($removeItem==1){
              echo('success');
         }else{
           echo('Unabl remove this item from your cart');
         }
    }
}
else{
    echo('connection_failed');
}
?>