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
if(isset($_POST['register']))
{
	$_SESSION['idno']=$_POST['idno'];
	$_SESSION['email']=strtolower($_POST['email']);
	$_SESSION['myList']=$_POST['myList'];
	$_SESSION['password']=$_POST['password'];
	$_SESSION['confirmpassword']=$_POST['confirmpassword'];
	$_SESSION['otp']=$rndno;
	header( "Location: faculty_authentication.php" ); 
} 
?>