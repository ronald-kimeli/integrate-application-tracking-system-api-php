<?php
include ("../env.php");
 
        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        
        $deal_name ="Game Changer";
        $deal_name =  urlencode($deal_name);
        
        $url = "https://api.recruitcrm.io/v1/deals/search?deal_name=$deal_name";
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]);
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

       