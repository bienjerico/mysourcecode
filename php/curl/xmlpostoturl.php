<?php 

/* receiver */
$url = 'https://xx.xx.xx.xx/';

/* xml query*/
$xml = '<testing command="user_query">
		  <ipaddr>' . $ip . '</ipaddr>
		  <macaddr>' . $mac . '</macaddr>
		  <key>' . $key . '</key>
		  <authentication>cleartext</authentication>
		  <version>1.0</version>
		</testing>';


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT , 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "xml=$xml");
$output = curl_exec($ch);
curl_close($ch);


