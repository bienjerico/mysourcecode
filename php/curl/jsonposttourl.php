<?php

/* receiver */
$url = "https://xx.xx.xx.xx/";

/* array data */
$data = array("sample" => "sample");	

$result = json_post_to_url($url,$data);


function json_post_to_url($url, $data){

        $data_string = json_encode($data);                                                                                   

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(       
                'Accept  application/json',
                'Content-Type: application/json; charset=UTF-8',                                                                                
                'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                                   

        $result = curl_exec($ch);	
        $http_status_json = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return '{"data":'.$result.',"https_status":"'.$http_status_json.'"}';
}
