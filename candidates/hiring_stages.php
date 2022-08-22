<?php
include ("../env.php");
 
        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $candidate_slug = "16603842584440027207nHI";
        $url = "https://api.recruitcrm.io/v1/candidates/${candidate_slug}/hiring-stages";
    
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, 
            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]
        );
        curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);
        // print_r($result);
        curl_close($curl);

        $dec =  json_decode($result,true);
        //  echo "<pre>";
        //  print_r($dec);
        if($e = curl_error($curl)){
            echo $e;
        }
         else{
          
        //     print_r("candidates from search"."</br>");
        //     echo "<hr/>";
        //    // print_r($result);
            $decs =  json_decode($result,true);
        //       echo "<pre>";
             
        //        //print_r($decs);
             foreach($decs as $dec):
                {
            echo "<pre>";
            print_r($dec);
             
                print_r("Job Slug:" .$dec['job_slug']."</br>");
                print_r("Candidate:" .$dec['candidate_slug']."</br>");
                print_r("Status:" .$dec['status']['label']."</br>");
                print_r("Stage date:" .$dec['stage_date']."</br>");
                print_r("Visibility:" .$dec['visibility']."</br>");
                print_r("Updated on:" .$dec['updated_on']."</br>");
                print_r("Updated by candidate Id:" .$dec['updated_by']['id']."</br>");
                print_r("Updated by First name:" .$dec['updated_by']['first_name']."</br>");
                print_r("Updated by Email:" .$dec['updated_by']['email']."</br>");
                echo "<hr/>";
   
                }
            endforeach;
        }
        