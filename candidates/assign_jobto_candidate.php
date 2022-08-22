<?php
include ("../env.php");
 
$curl = curl_init();
$token = $_ENV['API_KEY'];
$candidate_slug = "16603842584440027207nHI";
$job_slug = "16603047145700000000bbf";
$url = "https://api.recruitcrm.io/v1/candidates/${candidate_slug}/assign?job_slug=$job_slug";
curl_setopt ($curl,CURLOPT_URL, $url);
curl_setopt ($curl,CURLOPT_POST, true);
curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
    "content-type: application/json"]);
curl_setopt ($curl,CURLOPT_POSTFIELDS, "");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec ($curl);
$error = curl_error($curl);
if($error){
    echo $error;
}
else{
    // print_r($result);
    $decs =  json_decode($result,true);
    echo "<pre>";
    print_r($decs);
}
curl_close($curl);

