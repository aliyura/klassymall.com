<?php
include('AppController.php');
include('app.config.php');
$app=new Application();

function updateAutocompletion($connection,$position,$new){
     //update auto complete dump
  $app=new Application();
  $prev=$app->find("{AUTOCOMPLETE_CODE='$position'}",'s_autocomplete');
  if($app->rows($prev)>0){   
    if($row=$app->fetch($prev)){ 

        $base=$row['AUTOCOMPLETE_TEXT'];
        $absBase=$row['AUTOCOMPLETE_TEXT'];
        $temp_base=explode(',',trim($base));
        for($i=0; $i<count($temp_base); $i++){
           if(strpos($base,$new)<=0){
               $base=$base.$new.',';
           }
        }
       mysqli_query($connection,"UPDATE s_autocomplete SET AUTOCOMPLETE_TEXT='$base' WHERE AUTOCOMPLETE_CODE='$position'");
    }
  }
}

if($con){
$request=$app->upper(($_GET['request']));
    
 if($request=='CHOOSER'){

  if(isset($_FILES['fileChooser']['tmp_name'])){
        $fileName='not_set';
        $uid=$app->real($_GET['id']); 
        $vindex=$app->real($_GET['vindex']);
        $file ='';

        $folder='../samples/'.$uid;
        if(!is_dir($folder)){
           mkdir($folder); 
        }
        $dir= $folder.'/';

         $upload_status=0;
         $upload_id=uniqid();
         $unique_file_name='Sayayya'.uniqid();


          $originalFileName=$_FILES['fileChooser']['name'];
          $file=$_FILES['fileChooser']['tmp_name']; 
     
           $fileName=$unique_file_name.'.jpg';
           $tobeSavedFileName=$unique_file_name.'.jpg';              
      
           $uploadCondition=move_uploaded_file($file,$dir.$tobeSavedFileName);
           if($uploadCondition==true){
              $upload_status=1;
           }else{
               $upload_status=0;
           }
    
        if($upload_status>0){
            
               $exist=$app->find("{id='$uid' and status='UP'}",'s_upload_master');
                  if($app->count($exist)<=0){

                   $res=$app->add("
                    {
                    id='$uid', 
                    upload_id='$upload_id', 
                    path='".$app->real($dir)."',
                    status='UP',
                    file_1='$fileName'
                    }",'s_upload_master');

                  if($res==1){  
                    echo('success');
                  }else{
                     echo('Unable to upload this sample 3'.$originalFileName);
                  }
              }else{
                     $res=$app->update("
                     {
                        file_$vindex='$fileName' ?=@ status='UP' and id='$uid'
                     }",'s_upload_master');

                   if($res==1){  
                      echo('success');
                   }else{
                      echo('Unable to upload this sample 3'.$originalFileName);
                   }      
             }
        }else{
          echo('Unable to upload this sample 3'.$originalFileName);
        }
  }
}
else if($request=='DETAILS'){
    
  
      $uid=$app->real($_GET['id']);
      $name=$app->capitalize($app->abs($app->real($_POST['i-name']))); 
      $category=$app->capitalize($app->abs($app->real($_POST['i-category'])));
      $subcategory=$app->capitalize($app->abs($_POST['i-category'])); 
      $quantity=$app->upper($app->abs($_POST['i-quantity']));
      $location=$app->capitalize($app->abs($_POST['i-location']));
      $area=$app->capitalize($app->abs($_POST['i-area'])); 
      $price=$app->capitalize($app->abs($app->real($_POST['i-price']))); 
      $condition=$app->upper($app->abs($app->real($_POST['i-condition'])));
      $option=$app->upper($app->abs($app->real($_POST['i-market-option']))); 
      $description=$app->capitalize($app->abs($app->real(htmlspecialchars($_POST['i-description']))));
      $getUploads=$app->find("{id='$uid' and status='UP'}",'s_upload_master');
      if($app->rows($getUploads)>0){   
        if($row=$app->fetch($getUploads)){             
            
            if($description==''){
                $description='No Description';
            }
          
            if($name!='' and $category!='' and $price!=''){
              
                $uploadID=$row['UPLOAD_ID'];
                $res=$app->add("
                {
                path='".$row['PATH']."',
                id='$uid',
                upload_id='".$uploadID."',
                item_name='$name',
                item_condition='$condition',
                category='$category',
                sub_category='$subcategory',
                price='$price', 
                quantity='$quantity',
                description='$description',
                status='PA',
                location='$location', 
                area='$area', 
                market_option='$option', 
                sample_1='".$row['FILE_1']."',
                sample_2='".$row['FILE_2']."',
                sample_3='".$row['FILE_3']."',
                sample_4='".$row['FILE_4']."',
                sample_5='".$row['FILE_5']."',
                sample_6='".$row['FILE_6']."',
                sample_7='".$row['FILE_7']."',
                sample_8='".$row['FILE_8']."'
                }",'s_items');
              if($res==1){  
                      $app->delete("
                      {
                        id='$uid',
                        status='UP'
                      }",'s_upload_master');

                     $userInfo=$app->find("{id='$uid'}",'s_users');
                     if($app->count($userInfo)>0){
                        if($row=$app->fetch($userInfo)){
                            $user_name=$app->abs($app->capitalize($row['NAME']));  
                            $user_mobile=$app->abs($app->capitalize($row['MOBILE_NUMBER']));
        
                            $app->sendSMS($user_mobile,'Dear '.$user_name.', your '.$name.' id on Sayayya App is '.$uploadID.'. We are currently reviewing it,  and it would be available to the market soon as aproved by the Sayayya community.');
                        }
                     }
                    updateAutocompletion($co,'002',$category);
                    updateAutocompletion($co,'002',$subcategory);
                    echo('success');
              }else{
                  $response='Unabl to upload item '.$res;
                  echo($response);
              }
            }else{
               $response='Unabl to upload item '.$res;
            }
          }
       }else{
           echo('NSS');
       }
  }
}
else{
  echo('connection_failed');
}
?>