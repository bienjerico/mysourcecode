<?php 

require_once "mailer.php";


$filename 	= "/csv/smaple.csv";
$to 		= 'xxxx@xxxx.com';
$cc 		= 'xxxx@xxxx.com';
$from 		= 'noreply@xxxx.com';
$from_name 	= 'XXXX';
$subject 	= "SAMPLE EMAIL";;
$message 	= "Hello World";//HTML Codes acceptable
$attachments= array($filename);

send_email($to, $cc, $from, $from_name, $subject, $message, $attachments);


?>