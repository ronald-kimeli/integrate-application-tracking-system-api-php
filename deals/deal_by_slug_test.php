<?php
include ("../env.php");
 
        
        $token = $_ENV['API_KEY'];
        $deal_slug = "16631617110470027207ByC";
     function deleted(){

        $token = $GLOBALS['token'];
        $deal_slug = $GLOBALS['deal_slug'];
                $curl = curl_init();
                $url = "https://api.recruitcrm.io/v1/deals/${deal_slug}";
                curl_setopt ($curl, CURLOPT_URL, $url);
                curl_setopt($curl, 
                    CURLOPT_HTTPHEADER,["authorization: Bearer $token",
                    "content-type: application/json"]
                );
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($curl);
                // print_r($result);
                curl_close($curl);
                $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                $next =  json_decode($result);
                $candidate_array = $next->additional_candidate_slugs;

        //Define indexed array
        $myarrayind = $candidate_array;
        
        //Given value to delete 
        $val = "16603128040690027207tfO";
        
        //Delete element by value using array_splice() from searching
        $key = array_search($val, $myarrayind);
        if (false !== $key) {
            array_splice($myarrayind, array_search($val, $myarrayind ), 1);
          
        }
        // prints the remaining array

        // $output =json_encode($myarrayind,true);
        $output = json_encode($myarrayind, JSON_FORCE_OBJECT);
         return $output;

        // foreach ($myarrayind as $dat) {
        //     return $dat;
        // }

        // //Make array to comma separated
        // $list = implode(', ', $myarrayind);
        // // print_r($list);
        // return $list;
      
     }
// print_r(deleted());

                    //Candidate slug to delete
                    $candidate_slug = "16603128040690027207tfO";
                    //Declare Variables and set values
                    $name = "Clerk2";
                    $deal_stage = 1;
                    $deal_value = 2030;

                    $data ='{
                        "name":"'.$name.'",
                        "deal_stage":"'.$deal_stage.'",
                        "deal_value":"'.$deal_value.'",
                        "candidate_slug":"deleted()"
                    }';

                    $curl = curl_init();
                    $url = "https://api.recruitcrm.io/v1/deals/${deal_slug}";
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



                    
                  
        