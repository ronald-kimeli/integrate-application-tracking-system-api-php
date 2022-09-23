<?php
include ("../env.php");

$token = $_ENV['API_KEY'];
$deal_slug = "16639378473790027207wGY";

function unassign_candidate($token,$deal_slug){
        $curl = curl_init();
        $url = "https://api.recruitcrm.io/v1/deals/${deal_slug}";
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, 
            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      
        $response= curl_exec($curl);
        $error = curl_error($curl);
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // print_r($http_status);
            if($error){
                print_r($error);
            }
            else{
                print_r($response);
            }
        curl_close($curl);
        exit;

        $next =  json_decode($response);
       
        // print_r($next);
        $candidate_array = $next->additional_candidate_slugs;
    //  print_r($candidate_array);
                //Define indexed array
                $myarrayind = $candidate_array;

                //Given value to delete 
                $val = "16603842584440027207nHI";

                if(($key = array_search($val, $myarrayind)) !== false){
                    // print_r($myarrayind[$key]);
                    unset($myarrayind[$key]);

                     $str = "";
                     foreach($myarrayind as $value){
                         $str .= "$value,";
                     }
                     $str = substr($str, 0, -2);
                     echo $str;
                  }
             
             }       

print_r(unassign_candidate($token,$deal_slug));