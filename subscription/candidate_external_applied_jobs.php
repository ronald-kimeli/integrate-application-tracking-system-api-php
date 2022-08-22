<?php
include ("../env.php");
 
$curl = curl_init();
$token = $_ENV['API_KEY'];
$url = "https://api.recruitcrm.io/v1/subscriptions";
$data = '{
          "event": "candidate.external.applied.jobs",
          "target_url": "https://webhook.site/6478dd25-dff2-4fe3-846e-009ed01ca4d3"
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

