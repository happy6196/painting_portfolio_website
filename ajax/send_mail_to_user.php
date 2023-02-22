<?php
require_once('../lib/config.php');
$email=$_REQUEST['email'];
$subject=$_REQUEST['subject'];
$msg=$_REQUEST['msg'];

        $to = $email;
	$from = "info@rawarajputmatrimony.com";
	
	$subject = $subject;		

	$message1 = $msg;
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	
	// More headers
	$headers2 = $headers.'From: '. $from . "\r\n";
	
	
	
	
	if( mail($to, $subject, $message1, $headers)) {
		echo $msg = '<font color="red">'."Mail sent successfully ! We will get back to you soon. ".'</font>';
	}  else {
            echo $msg = '<font color="red">'."Mail Not Send !!".'</font>';
}
	