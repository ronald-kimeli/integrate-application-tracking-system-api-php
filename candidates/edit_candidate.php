<?php
include ("../env.php");
 
$curl = curl_init();
$token = $_ENV['API_KEY'];
$candidate_slug = "16603802548380027207Whf";
$url = "https://api.recruitcrm.io/v1/candidates/${candidate_slug}";
$data = '{
        "first_name":"Jeremiah",
        "last_name":"Walter",
        "email": "traceyjames@gmail.com",
        "contact_number": "+26288965",
        "gender_id": 1,
        "qualification_id": 4,
        "specialization": "Statistics with computing",
        "work_ex_year": 4,
        "candidate_dob": "1999-06-29T05:36:22.000000Z",
        "current_salary": "35000",
        "salary_expectation": "50000",
        "willing_to_relocate": 1,
        "current_status": "Employed",
        "notice_period": 60,
        "currency_id": 2,
        "city": "Eldoret",
        "relevant_experience": 2,
        "position": "Lecturer",
        "language_skills": [
          {
            "language_id": 36,
            "proficiency_id": "5"
          }
        ],
        "skill": "Statistical impression"
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

