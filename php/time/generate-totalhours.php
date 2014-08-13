<?php 
function get_total_hours($datetime_in,$datetime_out)
{
  $result = "";

  if(strtotime($datetime_out) > strtotime($datetime_in) && $datetime_in!="" && $datetime_out!="")
  {
      $result = number_format((strtotime($datetime_out) - strtotime($datetime_in))/60/60, 2);
  } 
   
   return $result;
}
?>
