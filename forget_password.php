<?php
session_start();
include('includes/config.php');
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST['next']))
{
$email=strtolower($_POST['email']);
$_SESSION['email']=$email;
  $id=strtolower($_POST["idno"]);
  $mail=strtolower($_POST["email"]);


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
    $idno = $row[0];
    $Email=$row[4];
   
    if($id==$idno && $mail==$Email)
    {
      echo '<div class="d-flex justify-content-center links">';
      include('forget_process.php');
      echo '</div>';

    }
    elseif($id==$idno && $mail!=$Email)
    {
      echo '<div class="d-flex justify-content-center links">';
      echo '</div>';
      echo '<script type="text/javascript">alert("Please Enter Proper Email");</script>';
    }
    elseif($id!=$idno && $mail!=$Email)
    {
      echo '<div class="d-flex justify-content-center links">';
      echo '</div>';
      echo '<script type="text/javascript">alert("Please Enter Proper Id");</script>';
    }
    else
    {
     echo "<script type='text/javascript'> alert('Please Enter Correct Id and Password'); </script>";
    } 

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
<h4 class="header-line">Forgot Password</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 FORGOT PASSWORD FORM
</div>
<div class="panel-body">
<form role="form" method="post" >

<div class="form-group">
<label>Enter Id no</label>
<input class="form-control" type="text" name="idno" autocomplete="on" />
</div>


<div class="form-group">
<label>Enter Email</label>
<input class="form-control"  type="text" name="email"   autocomplete="on"  />
</div>

<input  type="submit"  class="btn btn-info"  name="next" value="Next" />  <input type="submit"  class="btn btn-info" name="cancel" Value="Cancel"/>
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