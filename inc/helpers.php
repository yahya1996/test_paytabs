<?php

function validate_input($input){
    $input = stripslashes(trim($input));
    $input = htmlentities($input,ENT_QUOTES);
    return $input;
}

function pay($data){
    $array = array(
        'profile_id'=>'101508',
        'tran_type'=>'sale',
        'tran_class'=>'ecom',
        'cart_currency'=>'SAR',
        'cart_amount'=>'103.2',
        'cart_id'=>'123',
        'cart_description'=>'Test Description',
        'customer_details' =>array("name"=>$_POST['first_name'].$_POST['last_name'],"email"=>$_POST['email'],'street1'=>$_POST['address'],'city'=>$_POST['state'],'country'=>$_POST['country']),
        'return'=>'https://yahya.website/index.php',

    );
       
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://secure.paytabs.sa/payment/request',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($array),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'authorization: SDJN6BMMTL-J69DNHGKTB-MK2KKMZZRZ'
  ),
));

$response = curl_exec($curl);
if(isset(json_decode($response)->redirect_url)){
    header('location:'.json_decode($response)->redirect_url.'');
    exit();
}else{
    print_r("<pre>");
    print_r($response);
    exit;
}
curl_close($curl);

}