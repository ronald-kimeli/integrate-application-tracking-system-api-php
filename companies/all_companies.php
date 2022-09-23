<?php
include ("../env.php");
 
        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $url = "https://api.recruitcrm.io/v1/companies";
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, 
            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec ($curl);
        //  print_r($result);
        curl_close($curl);

        $decs =  json_decode($result,true);
        echo "<pre>";
         print_r($decs);
        // if($e = curl_error($curl)){
        //     echo $e;
        // }
        // else{
          
        //     print_r("All candidates"."</br>");
        //     echo "<hr/>";
        //    // print_r($result);
        //       $decs =  json_decode($result,true);
        //       echo "<pre>";
             
        //        //print_r($decs);
        //      foreach($decs as $dec):
        //         {
        //     //print_r($dec);
        //          foreach((array)$dec as $next):
        //             {
        //                 if(is_array($next))
        //                 {
        //                     //print_r($next);
        //                      print_r("Id:" .$next['id']."</br>");
        //                      print_r("Slug:" .$next['slug']."</br>");
        //                      print_r("First Name:" .$next['first_name']."</br>");
        //                      print_r("Last Name:" .$next['last_name']."</br>");
        //                      print_r("Email:" .$next['email']."</br>");
        //                      print_r("Contact number:" .$next['contact_number']."</br>");
        //                      print_r("Gender id:" .$next['gender_id']."</br>");
        //                      print_r("Language Skills:" .$next['language_skills']."</br>");
        //                      print_r("Qualification Id:" .$next['qualification_id']."</br>");
        //                      print_r("Specialization:" .$next['specialization']."</br>");
        //                      print_r("Years of experience:" .$next['work_ex_year']."</br>");
        //                      print_r("Date of birth:" .$next['candidate_dob']."</br>");
        //                      print_r("Current Salary:" .$next['current_salary']."</br>");
        //                      print_r("Salary Expectation:" .$next['salary_expectation']."</br>");
        //                      echo "<hr/>";
        //                 }
                   
        //             }
        //         endforeach;
        //         }
        //     endforeach;
        // }