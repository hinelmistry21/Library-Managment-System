<?php
session_start();
$rndno=rand(100000, 999999);//OTP generate

$message = urlencode("otp number.".$rndno); 

$fetch=strtolower($_SESSION['idno']);

    //echo "<script type='text/javascript'> alert($fetch); </script>";
$email=$fetch."@charusat.edu.in";
$to=$email;
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: librarysystem59@gmail.com" . "\r\n" ;
mail($to,$subject,$txt,$headers);
if(isset($_POST['register']))
{
$_SESSION['idno']=strtolower($_POST['idno']);
$_SESSION['year']=$_POST['year'];
$_SESSION['myList']=$_POST['myList'];
$_SESSION['password']=$_POST['password'];
$_SESSION['confirmpassword']=$_POST['confirmpassword'];
$_SESSION['email']=$email;
$_SESSION['otp']=$rndno;
header( "Location: student_authentication.php" ); 
} ?>