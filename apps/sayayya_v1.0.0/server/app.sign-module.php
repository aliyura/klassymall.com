 <?php
include('AppController.php');
include('app.config.php');
$app=new Application();

if($con){
$request=$app->upper(($_GET['request']));
    
    if($request=='SIGNUP_VALIDATION'){
         $objective=$app->real($_GET['objective']);
         if($objective=='1'){
             //individual
              $email=$app->real($_POST['p-email']);
              $number=$app->real($_POST['p-number']);                          
         }else{
             //business
              $email=$app->real($_POST['b-email']);
              $number=$app->real($_POST['b-number']);
         }
          $checkEmail=$app->find("{email_address='$email'}",'s_users');
          $checkMobile=$app->find("{mobile_number='$number'}",'s_users');
          if($app->count($checkEmail)>0){
              echo('EAE');
          }else if($app->count($checkMobile)>0){
              echo('MAE');
          }
          else{
             echo('success');
          }
    }
    if($request=='SIGNUP'){
         $objective=$app->real($_GET['objective']);
         if($objective=='1'){
             //individual
              $name=$app->real($_POST['p-name']);
              $email=$app->real($_POST['p-email']);
              $number=$app->real($_POST['p-number']);
              $password=$app->real($_POST['p-password']); 
              $username=$app->real($_POST['p-new_username']);
              $location=$app->real($_POST['p-location']); 
              $area=$app->real($_POST['p-area']);
              $gender=$app->real($_POST['p-gender']);
              $dob=$app->real($_POST['p-dob']);
              $address=$app->real($_POST['p-address']);  
                          
         }else{
             //business
              $name=$app->real($_POST['b-name']);
              $email=$app->real($_POST['b-email']);
              $number=$app->real($_POST['b-number']);
              $password=$app->real($_POST['b-password']); 
              $location=$app->real($_POST['b-location']); 
              $area=$app->real($_POST['b-area']);
              $username=$app->real($_POST['b-new_username']);
              $gender=$app->real($_POST['b-category']);
              $dob=$app->real($_POST['b-bed']);
              $address=$app->real($_POST['b-address']);  
                   
         }
         $password=md5($password);
         $uid=uniqid();
         $pin=mt_rand(100000,999999); 
         $pid=mt_rand(100000,999999);
        
          $checkUsername=$app->find("{username='$username'}",'s_users'); 
          $checkEmail=$app->find("{email_address='$email'}",'s_users');
          $checkMobile=$app->find("{mobile_number='$number'}",'s_users');
          if($app->count($checkUsername)>0){
              echo('UAE');
          }else if($app->count($checkEmail)>0){
              echo('EAE');
          }else if($app->count($checkMobile)>0){
              echo('MAE');
          }
          else{
              
              if($name!='' and $number!='' and $password!='' and $username!=''){
                  $res=$app->add("
                  {
                    id='$uid',
                    pin='$pin', 
                    pid='S-$pid', 
                    max_sales='10',
                    offer_code='STD0010',
                    dp='/dps/default/dp.jpg',
                    name='$name',
                    email_address='$email',
                    mobile_number='$number',
                    username='$username', 
                    location='$location', 
                    city='$area',
                    password='$password',
                    category='$gender',
                    profile_type='$objective',
                    status='IA',
                    dob='$dob',
                    address='$address'
                  }",'s_users');
                  if($res==1){  
                     $app->execute($con,"UPDATE s_users t1, s_default t2 SET t1.DP=t2.Content WHERE t1.ID='$uid';");
                     $app->sendSMS($number,'Dear '.$name.', your activation pin is '.$pin);

                     echo('success');

                  }else{
                      $response='Unabl to create your account !';
                      echo($response);
                  }
              }else{
                 $response='Unabl to create your account !';   
              }
          }
    }
    else if($request=='SIGNIN'){
        // signin here
         $username=$app->real($_POST['username']);
         $password=md5($app->real($_POST['password']));
    
          $checkUsername=$app->find("{username='$username'}",'s_users');
          $checkPassword=$app->find("{password='$password'}",'s_users');
          $checkActivation=$app->find("{username='$username',password='$password',status in('AC','SP','ER','IA')}",'s_users'); 
          if($app->count($checkUsername)<=0){
              echo('IU');
          }
          else if($app->count($checkPassword)<=0){
              echo('IP');
          }
          else{
              
             if($app->count($checkActivation)>0){
                 
                if($row=$app->fetch($checkActivation)){
                    $status=strtoupper($row['STATUS']);
                    if($status=='AC'){
    
                       $DP=$app->abs($row['DP']);
                       $MSISDN=preg_replace('/^0/', '', $row['MOBILE_NUMBER'], 1);
                       $description=$app->capitalize($app->abs($row['DESCRIPTION']));
                       if($description=='' or $description==null){
                          $description='No Description';
                       }

                        $result='{
                          "id":"'.$app->abs($row['ID']).'", 
                          "name":"'.$app->capitalize($app->abs($row['NAME'])).'", 
                          "email":"'.$app->capitalize($app->abs($row['EMAIL_ADDRESS'])).'", 
                          "mobile":"'.$MSISDN.'", 
                          "address":"'.$app->capitalize($app->abs($row['ADDRESS'])).'", 
                          "description":"'.$description.'", 
                          "username":"'.$app->abs($row['USERNAME']).'", 
                          "offer":"'.$app->upper($app->abs($row['OFFER_CODE'])).'",
                          "oc":"'.$app->upper($app->abs($row['OC_FLAG'])).'", 
                          "city":"'.$app->capitalize($app->abs($row['CITY'])).'", 
                          "dob":"'.$app->upper($app->abs($row['DOB'])).'", 
                          "category":"'.$app->capitalize($app->abs($row['CATEGORY'])).'", 
                          "profile":"'.$app->capitalize($app->abs($row['PROFILE_TYPE'])).'",
                          "dp":"'.$DP.'"
                          }';
                       echo('success:'.$result);   
                        
                    }
                    else{
                       echo($status);
                    }
                }
            }
            else{
                echo('ILC');
            }
        }
    } 
    else if($request=='ACTIVATION_CODE'){
          $username=$app->real($_GET['username']);
         
          $testUsername=$app->find("{username='$username' order by CREATED_DATE asc limit 1}",'s_users');
          if($app->count($testUsername)>0){
              
                if($row=$app->fetch($testUsername)){
                   
                   $uid=$app->abs($row['ID']); 
                   $umobile=$app->abs($row['MOBILE_NUMBER']);
                   $pin=mt_rand(100000,999999);
                    
                   $sendPIN=$app->update("{pin='$pin' ?=@ id='$uid' and username='$username'}",'s_users');
                   if($sendPIN==1){  
                       $app->sendSMS($umobile,'Your new activation pin is '.$pin);
                       echo('success');
                   }else{
                    $response='Unabl to send you new  a Activation PIN !';
                    echo($response);
                   }
                }
          }
    }
    else if($request=='VARIFICATION'){
         $username=$app->real($_POST['v-username']);
         $vcode=$app->real($_POST['v-code']);
    
          $testUsername=$app->find("{username='$username'}",'s_users');
          $testVCode=$app->find("{pin='$vcode'}",'s_users');
          $testBoth=$app->find("{pin='$vcode',username='$username'}",'s_users');
   
          if($app->count($testUsername)<=0){
              echo('IU');
          }else if($app->count($testVCode)<=0){
              echo('IVC');
          }
          else{
             if($app->count($testBoth)>0){
                if($row=$app->fetch($testBoth)){
                   $uid=$app->abs($row['ID']);
                   $activated=uniqid();
                    
                   $activate=$app->update("{status='AC',pin='$activated'  ?=@ id='$uid' and pin='$vcode'}",'s_users');
                
                   if($activate==1){
                       echo('success');
                   }else{
                    $response='Unabl to activate your account !';
                    echo($response);
                   }

                }
             }else{
               echo('IC');
             }
         }
    } 
    else if($request=='RECOVER'){
        
          $username=$app->real($_POST['r-username']);
          $mobile=$app->real($_POST['r-mobile']);
    
          $checkUsername=$app->find("{username='$username'}",'s_users');
          $checkMobile=$app->find("{mobile_number='$mobile'}",'s_users');
          $checkCredentials=$app->find("{username='$username' and mobile_number='$mobile'}",'s_users'); 
          if($app->count($checkUsername)<=0){
              echo('IU');
          }
          else if($app->count($checkMobile)<=0){
              echo('IM');
          }
          else{
              
             if($app->count($checkCredentials)>0){
                 
                if($row=$app->fetch($checkCredentials)){
                   $pin=mt_rand(100000,999999);
                   $uid=$row['ID']; 
                   $name=$row['NAME'];
                    
                   $sendPIN=$app->update("{pin='$pin' ?=@ id='$uid' and username='$username' and mobile_number='$mobile'}",'s_users');
                   if($sendPIN==1){  
                        $app->sendSMS($mobile,'Your password recovery key is '.$pin);
                       echo('success:'.$uid);
                   }else{
                    $response='Unabl to recover your Account !';
                    echo($response);
                   }
                    
                }
            }
            else{
                echo('IC');
            }
        }
    }   
    else if($request=='RESET'){
        
        $newPassword=md5($app->real($_POST['r-new-password'])); 
        $uid=trim($app->real($_GET['id']));     
        
           $checkCredentials=$app->find("{id='$uid'}",'s_users'); 
           if($app->count($checkCredentials)>0){
                 
              $updatePassword=$app->update("{password='$newPassword' ?=@ id='$uid'}",'s_users');
              if($updatePassword==1){  
                  echo('success');
              }else{
               $response='Unabl to reset your Password !';
               echo($response);
              }
              
            }
            else{
                echo('Unable to reset password, Account not found !');
            }
    }  
    else if($request=='RESEND_KEY'){
        
         $uid=trim($app->real($_GET['id']));   
         $checkCredentials=$app->find("{id='$uid'}",'s_users'); 
         if($app->count($checkCredentials)>0){
           if($row=$app->fetch($checkCredentials)){
                $pin=mt_rand(100000,999999);
                $mobile=$row['MOBILE_NUMBER'];
                $email=$row['EMAIL_ADDRESS'];
             
               $sendPIN=$app->update("{pin='$pin' ?=@ id='$uid'}",'s_users');
               if($sendPIN==1){  
                   $app->sendSMS($mobile,'Your password recovery key is '.$pin);
                   echo('success');
               }else{
                echo('Unabl to send your password recovery key !');
               }
           }
         }else{
           echo('Unable to send your password recovery key, Account not found !');   
         }
    }
    else{
       // any other here
    }
}
else{
    echo('connection_failed');
}
?>