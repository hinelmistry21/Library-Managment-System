<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST["idno"]))
{
  $id=strtoupper($_POST["idno"]);
  $pass1=$_POST["password"];
        
  if(!$conn)
  {
    die('could not connect' . mysqli_error($conn));
  }
        
  if(is_numeric($id))
  {
    $sql = "SELECT * FROM teacher WHERE TeacherId='$id'";
    $result=mysqli_query($conn,$sql); 
  }
  else
  {
    $sql = "SELECT * FROM student WHERE StudentId='$id'";
    $result=mysqli_query($conn,$sql); 
  }

  if (!$result)
  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }

  $row = mysqli_fetch_row($result);
  $id = $row[0];
  $pass2=$row[3];
  
  if($pass1==$pass2)
  {
    echo '<div class="d-flex justify-content-center links">';
    echo"pass matched";
    echo '</div>';
    session_start();
    $_SESSION['login']=$_POST['idno'];
    $id=$_SESSION['login'];
    if($id==489)
    {
    echo '<script type="text/javascript">location.href = "admin_login.php";</script>';
	  }
    elseif($id==490)
    {
      echo '<script type="text/javascript">location.href = "employee_login.php";</script>';
    }
    else
  	{
  		echo '<script type="text/javascript">location.href = "user_login.php";</script>';
  	}
  }
  else
  {
    echo "<script type='text/javascript'> alert('Please Enter Correct Id and Password'); </script>";
  }
}
else
{
  echo '<div class="d-flex justify-content-center links">';
  // echo "Enter Username and Password";
  echo '</div>';
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
<h4 class="header-line">USER LOGIN FORM</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter Id no</label>
<input class="form-control" type="text" name="idno" required autocomplete="off" />
</div>


<div class="form-group">
<label>Enter Password</label>
<input class="form-control" type="password" name="password" required autocomplete="off"  />
<p class="help-block"><a href="forget_password.php">Forgot Password</a></p>
</div>

 <button type="submit" name="login" class="btn btn-info">LOGIN </button> 
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