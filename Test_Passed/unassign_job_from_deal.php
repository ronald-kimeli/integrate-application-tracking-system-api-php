<?php
include ("../env.php");
//Api Token
$token = $_ENV['API_KEY'];

$deal_name ="Multi-Million Deal";
$deal_name =  urlencode($deal_name);
$job_slug = "16639175460780027207kSw";

// OUR function of deleting sing user and remaining with the rest
    function unassign_job($token,$deal_name,$job_slug)
            {
                #*Make get request to find associated contact with the deal_slug and extract from additional_candidate_slugs Array*#
                        $curl = curl_init();
                        $url = "https://api.recruitcrm.io/v1/deals/search?deal_name=$deal_name";
                        curl_setopt ($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, 
                            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
                            "content-type: application/json"]
                        );
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                        $response = curl_exec($curl);
                        $error = curl_error($curl);
                        curl_close($curl);
                        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                    #**Condition if response == "success"**#
                    if ($http_status == 200) 
                        {
                            $json_obj =  json_decode($response);
                                // print_r($json_obj);
                                $jobs_array = $json_obj->data[0]->additional_job_slugs;
                                //  print_r($jobs_array);
                                // exit;
                                $mainArray = $jobs_array;
                                //Given job_slug to delete 
                                $delete_value = $job_slug;

                                if(($key = array_search($delete_value, $mainArray)) !== false)
                                        {
                                        // print_r($mainArray[$key]);
                                         unset($mainArray[$key]);
                                         #**Our Array remaining after unassigning specified candidate***#
                                            $list = implode(',', $mainArray);
                                            // print_r($list);
                                            // Since Candidate_slug field accepts comma separated string e.g "577777,698888,2222222" 
                                               #**we will append the remaining back as input with no space before json_obj item back to the server.
                                                $json_body ='{
                                                    "job_slug":"'.$list.'"
                                                }';                            
                                                $deal_slug = $json_obj->data[0]->slug;
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
                                                                print_r("Remark:"."\r\n"."Job Unassigned Successfully!");
                                                                // print_r($response);
                                                            }
                                                    curl_close($curl);   
                                        }
                                else
                                    {  
                                        // --ERROR IF PROVIDED COMPANY SLUG NOT FOUND--//
                                        print_r("Job Not Found!\r\n Please Check and try again."."</br></br>"); 
                                    }
                            } 
                    else 
                        {
                          print_r($response);
                          exit();
                     }
            }       
unassign_job($token,$deal_name,$job_slug);