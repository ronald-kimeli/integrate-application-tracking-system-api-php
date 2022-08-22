<?php
include ("../env.php");
 
        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $candidate_slug = "16603842584440027207nHI";
        $url = "https://api.recruitcrm.io/v1/candidates/${candidate_slug}/request-update";
    
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, 
            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]
        );
        curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);
        print_r($result);
        curl_close($curl);

        $dec =  json_decode($result,true);
        //  echo "<pre>";
        //  print_r($dec);
        if($e = curl_error($curl)){
            echo $e;
        }

        