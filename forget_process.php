<?php
session_start();
$rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno); 
$to=strtolower($_SESSION['email']);
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: librarysystem59@gmail.com" . "\r\n" .
"CC: librarysystem59@gmail.com";
mail($to,$subject,$txt,$headers);
if(isset($_POST['next']))
{
	$_SESSION['idno']=$_POST['idno'];
	$_SESSION['email']=strtolower($_POST['email']);
	$_SESSION['otp']=$rndno;
	header( "Location: forget_authentication.php" ); 
} 
?>