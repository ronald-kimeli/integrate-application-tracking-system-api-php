<?php
include ("../env.php");
 
$curl = curl_init();
$token = $_ENV['API_KEY'];
$candidate_slug = "16603802548380027207Whf";
$url = "https://api.recruitcrm.io/v1/candidates/${candidate_slug}";
curl_setopt ($curl,CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
    "content-type: application/json"]);
//curl_setopt ($curl,CURLOPT_POSTFIELDS, $request);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


$result = curl_exec ($curl);
$error = curl_error($curl);
if($error){
    echo $e;
}

$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if($http_status >= 400){
    echo "Not Found! Check your Slug Id and try again!";
} 
else{
    echo "Deleted Successfully";
}

curl_close($curl);