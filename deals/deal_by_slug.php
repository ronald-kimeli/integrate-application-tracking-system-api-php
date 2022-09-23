<?php
include ("../env.php");
 
        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $deal_slug = "16631617110470027207ByC";
        $url = "https://api.recruitcrm.io/v1/deals/${deal_slug}";
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, 
            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);
        print_r($result);
        curl_close($curl);

        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        // $next =  json_decode($result,true);
        
        // if($e = curl_error($curl)){
        //     echo $e;
        // }
        

        // if($http_status >= 400){
        //     echo "<pre>";
        //     print_r("Error:" .$next['error']."</br>");
        //     print_r("ErrorCode:" .$next['errorCode']."</br>");
        //     print_r("ErrorMessage:" .$next['errorMessage']."</br>");
        // } 
        // else{
        //     // echo "<pre>";
        //     // print_r($next);
           
        //     print_r("Id:" .$next['id']."</br>");
        //     print_r("DealName:" .$next['name']."</br>");
        //     print_r("CreatedOn:" .$next['created_on']."</br>");
        //     print_r("UpdatedOn:" .$next['updated_on']."</br>");
        //     print_r("Deal_stage_id:" .$next['deal_stage']['id']."</br>");
        //     print_r("Deal_stage:" .$next['deal_stage']['label']."</br>");
        //     print_r("Deal_stage_percentage:" .$next['deal_stage']['percentage']."</br>");
        //     print_r("Deal_value:" .$next['deal_value']."</br>");
        //     print_r("Deal_percentage:" .$next['deal_precentage_value']."</br>");
        //     print_r("CloseDate:" .$next['close_date']."</br>");
        //     print_r("DealType_id:" .$next['deal_type']['id']."</br>");
        //     print_r("DealType:" .$next['deal_type']['label']."</br>");
        //     print_r("Deal Slug:" .$next['slug']."</br>");
        //     print_r("Created By:" .$next['created_by']."</br>");
        //     print_r("Updated_By:" .$next['updated_by']."</br>");
        //     print_r("Owner:" .$next['owner']."</br>");
        //     print_r("Resource_url:" .$next['resource_url']."</br>");
        // }

       