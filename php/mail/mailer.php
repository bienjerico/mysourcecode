

<?php 

function send_email($to,$cc, $from, $from_name, $subject, $message, $attachments=false){

$headers = "From: ".$from_name."<".$from.">\r\n";
$headers .= "Reply-To: ".$from_name."<".$from.">\r\n";
$headers .= "cc: ".$cc."\r\n";
$headers .= "Return-Path: ".$from_name."<".$from.">\r\n";
$headers .= "Message-ID: <".time()."-".$from.">\r\n";
$headers .= "X-Mailer: PHP v".phpversion();

$msg_txt="";
$email_txt = $message;

$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

$headers .= "\r\nMIME-Version: 1.0\r\n" ."Content-Type: multipart/mixed;\r\n" ." boundary=\"{$mime_boundary}\"";
$email_txt .= $msg_txt;
$email_message = "This is a multi-part message in MIME format.\r\n\r\n" ."--{$mime_boundary}\r\n" ."Content-Type:text/html; charset=\"iso-8859-1\"\r\n" ."Content-Transfer-Encoding: 7bit\r\n\r\n" .
$email_txt . "\r\n\r\n";


if ($attachments !== false){

	for($i=0; $i < count($attachments); $i++){

		if (is_file($attachments[$i])){
		$fileatt = $attachments[$i];
		$fileatt_type = "application/octet-stream";
		$start= strrpos($attachments[$i], '/') == -1 ? strrpos($attachments[$i], '//') : strrpos($attachments[$i], '/')+1;
		$fileatt_name = substr($attachments[$i], $start, strlen($attachments[$i]));

		$file = fopen($fileatt,'rb');
		$data = fread($file,filesize($fileatt));
		fclose($file);

		$data = chunk_split(base64_encode($data));

		$email_message .= "--{$mime_boundary}\r\n" ."Content-Type: {$fileatt_type};\r\n" ." name=\"{$fileatt_name}\"\r\n" ."Content-Transfer-Encoding: base64\r\n\r\n" .
		$data . "\r\n\r\n";

		}
    }
}

$email_message .= "--{$mime_boundary}--\r\n";

return mail($to, $subject, $email_message, $headers);
}


?>