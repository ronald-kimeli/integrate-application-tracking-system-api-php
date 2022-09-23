<?php
include ("../env.php");

//Api Token
$token = $_ENV['API_KEY'];

//Declare Variables and set values
$name = "Niger";
$deal_stage = 1;
$deal_value = 2022;
$deal_precentage_value = 10;
$close_date = "2022-12-12T23:59:59.000000Z";
$deal_type = 2;
// company_slug,contact_slugs,job_slug and candidate_slug accepts more than a single character and it should be comma separated
$company_slug ="16603047145380000000cdc";
$contact_slugs ="16603047145520000000cae";
$job_slug = "16603047145700000000bbf";
$contact_slugs2 = "16603924811910027207vYs";
$candidate_slug = "16603128040690027207tfO";

$data ='{
	"name":"'.$name.'",
	"deal_stage":"'.$deal_stage.'",
	"deal_value":"'.$deal_value.'",
	"deal_precentage_value":"'.$deal_precentage_value.'",
	"close_date": "'.$close_date.'",
	"deal_type":"'.$deal_type.'",
	"company_slug":"'.$company_slug.'",
	"contact_slugs":"'.$contact_slugs.','.$contact_slugs2.'",
	"job_slug": "'.$job_slug.'",
	"candidate_slug": "'.$candidate_slug.'"
}';

$curl = curl_init();
$url = "https://api.recruitcrm.io/v1/deals";
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

