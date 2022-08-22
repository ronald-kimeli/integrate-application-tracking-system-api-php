<?php
include ("../env.php");
 
        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $limit = 15;
        $page = 1;
        $url = "https://api.recruitcrm.io/v1/subscriptions?limit=$limit";
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, 
            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec ($curl);
       // print_r($result);
        curl_close($curl);

        $decs =  json_decode($result,true);
        echo "<pre>";
         print_r($decs);
        if($e = curl_error($curl)){
            echo $e;
        }
        // else{
          
        //     print_r("All jobs"."</br>");
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
        //                      print_r("Name:" .$next['name']."</br>");
        //                      print_r("Description:" .$next['enable_job_application_form']."</br>");
        //                      print_r("Specialization:" .$next['specialization']."</br>");
        //                      print_r("Status:" .$next['job_status']['label']."</br>");

        //                     //  print_r("Salary_Type:" .$next['salary_type']['label']."</br>");
                            
        //                      echo "<hr/>";
        //                 }
                   
        //             }
        //         endforeach;
        //         }
        //     endforeach;
        // }