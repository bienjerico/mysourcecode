<?php 

function get_time_to_decimal($time) {
        $result     = "";
        if(trim($time)!="" && trim($time)!="00:00:00"){
            $timeArr    = explode(':', $time);
            $decTime    = ($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2]/60);
            $result     = number_format($decTime/60,2);
        }
        return $result;
}

?>