<?php
include ("../env.php");
 
        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $candidate_slug = "16603802548380027207Whf";
        $url = "https://api.recruitcrm.io/v1/candidates/${candidate_slug}";
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, 
            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);
        //print_r($result);
        curl_close($curl);

        $next =  json_decode($result,true);
        //  echo "<pre>";
        //  print_r($next);
        if($e = curl_error($curl)){
            echo $e;
        }
         else{
            print_r("Specific candidate"."</br>");
            echo "<hr/>";
                print_r("Id:" .$next['id']."</br>");
                print_r("Slug:" .$next['slug']."</br>");
                print_r("First Name:" .$next['first_name']."</br>");
                print_r("Last Name:" .$next['last_name']."</br>");
                print_r("Email:" .$next['email']."</br>");
                print_r("Contact number:" .$next['contact_number']."</br>");
                print_r("Gender id:" .$next['gender_id']."</br>");
                print_r("Qualification Id:" .$next['qualification_id']."</br>");
                print_r("Specialization:" .$next['specialization']."</br>");
                print_r("Years of experience:" .$next['work_ex_year']."</br>");
                print_r("Date of birth:" .$next['candidate_dob']."</br>");
                print_r("Current status:" .$next['current_status']."</br>");
                print_r("Notice period:" .$next['notice_period']."</br>");
                print_r("Position:" .$next['position']."</br>");
                print_r("City:" .$next['city']."</br>");
                print_r("Skill:" .$next['skill']."</br>");
                print_r("Current Salary:" .$next['current_salary']."</br>");
                print_r("Salary Expectation:" .$next['salary_expectation']."</br>");
                echo "<hr/>";
         }
        