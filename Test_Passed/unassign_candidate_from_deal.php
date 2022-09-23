<?php
include ("../env.php");
//Api Token
$token = $_ENV['API_KEY'];
//To edit a deal you need job_slug(edit by job_slug) and slug of the specified candidate.
$deal_slug = "16631617110470027207ByC";
$candidate_slug = "16603842584440027207nHI";
// $candidate_slug = "16603128040690027207tfO";
// $candidate_slug = "16603047145190000000afd";

// OUR function of deleting sing user and remaining with the rest
    function unassign_candidate($token,$deal_slug,$candidate_slug)
            {
                #*Make get request to find associated contact with the deal_slug and extract from additional_candidate_slugs Array*#
                        $curl = curl_init();
                        $url = "https://api.recruitcrm.io/v1/deals/${deal_slug}";
                        curl_setopt ($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, 
                            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
                            "content-type: application/json"]
                        );
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                        $response = curl_exec($curl);
                        curl_close($curl);
                        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                    #**Condition if response == "success"**#
                    if ($http_status == 200) 
                        {
                            $next =  json_decode($response);
                                // print_r($next);
                                #*****Our candidates are stored in this array*****#
                                $candidate_array = $next->additional_candidate_slugs;
                                //  print_r($candidate_array);
                                // Define indexed array associated with each candidate
                                $myarrayind = $candidate_array;
                                //Given candidate_slug to delete 
                                $val = $candidate_slug;
                                //Delete element by value using unset function from searching
                                if(($key = array_search($val, $myarrayind)) !== false)
                                        {
                                        // print_r($myarrayind[$key]);
                                        #*Delete by unsetting.
                                         unset($myarrayind[$key]);
                                         #**Our Array remaining after unassigning specified candidate***#
                                            $list = implode(',', $myarrayind);
                                            // print_r($list);
                                            // Since Candidate_slug field accepts comma separated string e.g ["577777",698888,2222222"] 
                                               #**we will append the remaining back as input with no space before next item back to the server.
                                                $json_body ='{
                                                    "candidate_slug":"'.$list.'"
                                                }';
                                                    $curl = curl_init();
                                                    $url = "https://api.recruitcrm.io/v1/deals/${deal_slug}";
                                                    curl_setopt ($curl,CURLOPT_URL, $url);
                                                    curl_setopt ($curl,CURLOPT_POST, true);
                                                    curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
                                                        "content-type: application/json"]);
                                                    curl_setopt ($curl,CURLOPT_POSTFIELDS, $json_body);
                                                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

                                                    $response = curl_exec ($curl);
                                                    $error = curl_error($curl);
                                                            if($error){
                                                                echo $error;
                                                            }
                                                            else{
                                                                print_r("Remark:"."\r\n"."Candidate Unassigned Successfully!");
                                                                // print_r($response);
                                                            }
                                                    curl_close($curl);   
                                        }
                                else
                                    {  
                                        // --ERROR IF PROVIDED CANDIDATE SLUG NOT FOUND--//
                                        print_r("Candidate Not Found!\r\n Please Check and try again."."</br></br>"); 
                                        // print_r($response);
                                        // $obj = json_decode($response);
                                        // $remaining_candidates = $obj->additional_candidate_slugs;
                                        // // print_r($remaining_candidates);
                                        // print_r("Remaining_candidates =");
                                        // foreach($remaining_candidates as $cand){
                                        //     echo "<p>";
                                        //         print_r($cand);
                                        //     echo "</p>";
                                        // }
                                        
                                    }
                            } 
                    else 
                        {
                          print_r($response);
                          exit();
                     }
            }       
     unassign_candidate($token,$deal_slug,$candidate_slug);