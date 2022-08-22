<?php
include ("../env.php");
 
$curl = curl_init();
$token = $_ENV['API_KEY'];
$candidate_slug = "16603128040690027207tfO";
$job_slug = "16603047145700000000bbf";
$url = "https://api.recruitcrm.io/v1/candidates/${candidate_slug}/apply?job_slug=$job_slug";
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
$decs =  json_decode($result,true);

$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if($http_status >= 400){
    echo "Error";
    echo "<pre>";
    print_r("Error:" .$decs['error']."</br>");
    print_r("ErrorCode:" .$decs['errorCode']."</br>");
    print_r("ErrorMessage:" .$decs['errorMessage']."</br>");
} 
else{
    echo "<pre>";
    // print_r($decs);
    echo "Applied Successfully";
    print_r("Job Slug:" .$decs['job_slug']."</br>");
    print_r("Candidate:" .$decs['candidate_slug']."</br>");
    print_r("Status:" .$decs['status']['label']."</br>");
    print_r("Stage date:" .$decs['stage_date']."</br>");
    print_r("Visibility:" .$decs['visibility']."</br>");
    print_r("Shared URL:" .$decs['shared_list_url']."</br>");
    print_r("Updated on:" .$decs['updated_on']."</br>");
    print_r("Updated by:" .$decs['updated_by']."</br>");
}

curl_close($curl);

