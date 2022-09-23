<?php
include ("../env.php");

//Api Token
$token = $_ENV['API_KEY'];

//Declare Variables and set values
$name = "Sql Developer/ Node js";
$deal_stage = 1;
$deal_value = 2022;
$deal_precentage_value = 10;
$close_date = "2022-12-12T23:59:59.000000Z";
$deal_type = 2;
// company_slug,contact_slugs,job_slug and candidate_slug accepts more than a single character and it should be comma separated
$company_slug ="16603047145380000000cdc";
$contact_slugs ="16603047145520000000cae";
$job_slug = "16603047145700000000bbf";
// $candidate_slug = "16603128040690027207tfO";

#**** Required properties   
#name string
#number_of_openings number
#company_slug number
#contact_slug number
#job_description_text string
#currency_id number
#enable_job_application_form number

{
	"name": "'.$name.'",
	"number_of_openings": 5,
	"company_slug": 33243,
	"contact_slug": 3445,
	"secondary_contact_slugs": 3445,
	"job_description_text": "Description Text",
	"minimum_experience": 5,
	"maximum_experience": 20,
	"salary_type": 1,
	"currency_id": 2,
	"min_annual_salary": 500000,
	"max_annual_salary": 800000,
	"qualification_id": 4,
	"specialization": "",
	"city": "New York",
	"locality": "Manhattan",
	"state": "",
	"country": "US",
	"address": "",
	"show_company_logo": 1,
	"job_questions": "",
	"collaborator": "",
	"note_for_candidates": "Please bring all original documents",
	"custom_fields": [
	  {
		"field_id": 1,
		"value": "U"
	  }
	],
	"enable_job_application_form": 1,
	"hiring_pipeline_id": 1
  }

$data ='{
	"name":"'.$name.'",
	"deal_stage":"'.$deal_stage.'",
	"deal_value":"'.$deal_value.'",
	"deal_precentage_value":"'.$deal_precentage_value.'",
	"close_date": "'.$close_date.'",
	"deal_type":"'.$deal_type.'",
	"company_slug":"'.$company_slug.'",
	"contact_slugs":"'.$contact_slugs.'",
	"job_slug": "'.$job_slug.'",
	"candidate_slug": "'.$candidate_slug.'"
}';

$curl = curl_init();
$url = "https://api.recruitcrm.io/v1/jobs";
curl_setopt ($curl,CURLOPT_URL, $url);
curl_setopt ($curl,CURLOPT_POST, true);
curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
    "content-type: application/json"]);
curl_setopt ($curl,CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec ($curl);
$error = curl_error($curl);
if($error){
    echo $error;
}
else{
    print_r($response);
}
curl_close($curl);

