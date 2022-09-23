<?php
include ("../env.php");
 
        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $added_from = "";
        $added_to = "";
        $closing_from ="2022-10-10T23:59:59.000000Z";
        $closing_to = "";
        $company_name="" ;
        $deal_name ="Clerk" ;
        $deal_stage=2 ;
        $owner_name="Ronald";
        $url = "https://api.recruitcrm.io/v1/deals/search?deal_name=$deal_name&owner_name=$owner_name";
        
        // $request= '{
        //     "custom_fields": [
        //                         {
        //                             "field_id": 1,
        //                             "filter_type": "equals",
        //                             "filter_value": "Clerk"
        //                         }
        //                      ]
        //           }';
        curl_setopt ($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]);
        // curl_setopt ($curl,CURLOPT_POSTFIELDS, $request);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);
        print_r($result);
        curl_close($curl);

        // $next =  json_decode($result,true);
        //     // echo "<pre>";
        //     // print_r($next);
        // if($e = curl_error($curl)){
        //     echo $e;
        // }
        // $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        // if($http_status >= 400){
        //     echo "<pre>";
        //    echo "There's no match to your Search";
        // } 
        // else{
        //     // echo "<pre>";
        //     // print_r($next);
        //    foreach($next as $to):{
        //     foreach((array)$to as $final):{
        //         if(is_array($final)){
        //     print_r("Id:" .$final['id']."</br>");
        //     print_r("DealName:" .$final['name']."</br>");
        //     print_r("CreatedOn:" .$final['created_on']."</br>");
        //     print_r("UpdatedOn:" .$final['updated_on']."</br>");
        //     print_r("Deal_stage_id:" .$final['deal_stage']['id']."</br>");
        //     print_r("Deal_stage:" .$final['deal_stage']['label']."</br>");
        //     print_r("Deal_stage_percentage:" .$final['deal_stage']['percentage']."</br>");
        //     print_r("Deal_value:" .$final['deal_value']."</br>");
        //     print_r("Deal_percentage:" .$final['deal_precentage_value']."</br>");
        //     print_r("CloseDate:" .$final['close_date']."</br>");
        //     print_r("DealType_id:" .$final['deal_type']['id']."</br>");
        //     print_r("DealType:" .$final['deal_type']['label']."</br>");
        //     print_r("Deal Slug:" .$final['slug']."</br>");
        //     print_r("Created By:" .$final['created_by']."</br>");
        //     print_r("Updated_By:" .$final['updated_by']."</br>");
        //     print_r("Owner:" .$final['owner']."</br>");
        //     print_r("Resource_url:" .$final['resource_url']."</br>");
        //         }
        //     }
        // endforeach;
        //    }
        // endforeach;
        
        // }

       