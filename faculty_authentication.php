<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
$rno=$_SESSION['otp'];
$urno=$_POST['otpvalue'];
    if($rno==$urno)
    {
            $a=$_SESSION['idno'];
            $b=strtolower($_SESSION['email']);
            $c=$_SESSION['myList'];
            $d=$_SESSION['password'];

             $sql_u = "SELECT * FROM teacher WHERE TeacherId='$a'";
             $res_u = mysqli_query($conn, $sql_u);

            if (mysqli_num_rows($res_u) > 0) 
            {
                echo "<script type='text/javascript'> alert('User Already Exists'); </script>";
                 echo "<script type='text/javascript'>location.href = 'index.php';</script>";

            }

            else
            {   
            
                $query = "INSERT INTO teacher(TeacherId,TagId,TeacherDepartment,Password,Email) VALUES ($a ,0,'$c' ,'$d', '$b')";
                echo  "INSERT INTO teacher(TeacherId,TagId,TeacherDepartment,Password,Email) VALUES ($a ,0,'$c' ,'$d', '$b')";
                $data = mysqli_query($conn , $query);

                if($data)
                {
                        
                    echo "<script type='text/javascript'> alert('Data Inserted Successfully'); </script>";
                    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
                }   
            }      
    }
    else
    {
    echo "<script type='text/javascript'> alert('Invalid otp'); </script>";
    }
}
//resend OTP
if(isset($_POST['resend']))
{
$message="<p >Sucessfully send OTP to your mail.</p>";
$_SESSION['otp']=rand(100000,999999);
$rno=$_SESSION['otp'];
$email=strtolower($_SESSION['email']);
$to=$email;
$subject = "OTP";
$txt = "OTP: ".$rno."";
$headers = "From: librarysystem59@gmail.com" . "\r\n" .
"CC: librarysystem59@gmail.com";
mail($to,$subject,$txt,$headers);
$message="<p><b>Sucessfully resend OTP to your mail.</b></p>";

}
if(isset($_POST['cancel']))
{
	session_destroy();
  header( "Location: index.php" ); 
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Digital Library Management System | </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
 <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                            
                            <li><a href="faculty.php">Faculty Signup</a></li>
                            <li><a href="student.php">Student Signup</a></li>
                            <li><a href="index.php">User Login</a></li>
                          
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">AUTHENTICATION</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 AUTHENTICATION
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter OTP</label>
<input class="form-control" type="text" name="otpvalue"  autocomplete="off" />
</div>



 <button type="submit" name="submit" class="btn btn-info">Submit </button> <button type="submit" name="resend" class="btn btn-info">Resend</button> <button type="submit"  name="cancel" class="btn btn-info">Cancel </button>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
