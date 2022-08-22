<?php
include ("../env.php");
 
$curl = curl_init();
$token = $_ENV['API_KEY'];
$url = "https://api.recruitcrm.io/v1/candidates?first_name=Tracey";
$data = '{
        "last_name": "James",
        "email": "traceyjames@gmail.com",
        "contact_number": "+26288965",
        "gender_id": 2,
        "qualification_id": 4,
        "specialization": "Information Technology",
        "work_ex_year": 3,
        "candidate_dob": "1999-06-29T05:36:22.000000Z",
        "current_salary": "35000",
        "salary_expectation": "50000",
        "willing_to_relocate": 1,
        "current_status": "Employed",
        "notice_period": 14,
        "currency_id": 2,
        "linkedin": "http://www.linkedin.com/michael4",
        "city": "Nairobi",
        "relevant_experience": 2,
        "position": "Administrator",
        "available_from": "2020-06-29T05:36:22.000000Z",
        "language_skills": [
          {
            "language_id": 20,
            "proficiency_id": "1"
          }
        ],
        "skill": "Python, PHP, Mysql, Postgres"
        }';
curl_setopt ($curl,CURLOPT_URL, $url);
curl_setopt ($curl,CURLOPT_POST, true);
curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
    "content-type: application/json",
    "content-type: multipart/form-data; boundary=---011000010111000001101001"]);
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

