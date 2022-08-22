<?php
include ("../env.php");
 
$curl = curl_init();
$token = $_ENV['API_KEY'];
$url = "https://api.recruitcrm.io/v1/deals";
$data = '{
          "name": "Clerk",
          "deal_stage": 2,
          "deal_value": 2000,
          "close_date": "2022-10-10T23:59:59.000000Z",
          "deal_type": 2
         }';
curl_setopt ($curl,CURLOPT_URL, $url);
curl_setopt ($curl,CURLOPT_POST, true);
curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
    "content-type: application/json"]);
curl_setopt ($curl,CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec ($curl);
$error = curl_error($curl);
if($error){
    echo $error;
}
else{
    print_r($result);
}
curl_close($curl);

