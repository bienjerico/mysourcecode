<?php 

function get_decimal_to_time($decimal) 
{
    $result = "";
    if($decimal!=""){
        $hour   = floor($decimal);
        $min    = round(60*($decimal-$hour));
        $result = str_pad($hour, 2, "0", STR_PAD_LEFT) . ":" . str_pad($min, 2, "0", STR_PAD_LEFT);
    }
    return $result;
}


?>