<?php
	require_once "email.class.php";

	$smtpserver = "ssl://smtp.gmail.com";//SMTP server
	$smtpserverport =465;//SMTP server port
	$smtpusermail = "findourroommatesquestionnaire@gmail.com";//SMTP server username@domain
//	$smtpemailto = "fakedestinyck@gmail.com";// to whom
	$smtpuser = "findourroommatesquestionnaire";//SMTP server username
	$smtppass = "dmf-Tok-u9f-npt";//SMTP server password
	$mailtitle = "[Do not reply] Find Our Roommates Questionnaire";//email title
	$mailcontent = "<h1 style='text-align: center; background-color: red; color: white'>Find Our Roommates Questionnaire</h1>";
	$mailcontent .= "<h2 style='text-align: center; background-color: #ce1e50; border: solid 5px darkturquoise; width: 70%; margin: 20px auto; color: white; font-weight: 100'>";//content
	$mailcontent .= $contentFromOthers;
	$mailcontent .= "</h2>";
	$mailtype = "HTML";//email type


	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);// use authentication
	$smtp->debug = false;
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

//	echo "<div style='width:300px; margin:36px auto;'>";
	if($state==""){
//		echo "<script type='text/javascript'>alert('Sending email failed!')</script>";
		exit();
	}
//	echo "<script type='text/javascript'>alert('Success!')</script>";

?>
