<?php 
session_start();
include('includes/config.php');
error_reporting(0);

if(isset($_POST['confirm']))
{
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $idno=strtolower($_SESSION['id']);
    if(!$conn)
    {
      die('could not connect' . mysqli_error($conn));
    }
    if($password==$confirmpassword)
    {
        if(is_numeric($idno))
        {
          $sql = "UPDATE teacher SET Password='$password'  WHERE TeacherId='$idno'";
          //$result=mysqli_query($conn,$sql); 
        }
        else
        {
          $sql =  "UPDATE student SET Password='$password'  WHERE StudentId='$idno'";
          //$result=mysqli_query($conn,$sql); 
        }

       if (mysqli_query($conn, $sql)) 
       {
        echo "Record updated successfully";
        echo '<script type="text/javascript">location.href = "index.php";</script>';
       }
       else 
       {
        echo "Error updating record: " . mysqli_error($conn);
       }
    }
    else
    {
        echo "<script type='text/javascript'> alert('Password and Confirm Password Field do not match  !!'); </script>"; 
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Digital Library Management System | CHANGE PASSWORD</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript">

    </script>
    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data:'emailid='+$("#emailid").val(),
                type: "POST",
                success:function(data){
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }
    </script>    

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
                <h4 class="header-line">Change Password</h4>
                
            </div>

        </div>
        <div class="row">
         
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
             <div class="panel panel-info">
                <div class="panel-heading">
                 CHANGE PASSWORD FORM
             </div>
             <div class="panel-body">
                <form name="signup" method="post" onsubmit="return valid(this);">
                    
           <div class="form-group">
<label>Re-Enter New Password </label>
<input class="form-control" type="password" name="password" autocomplete="off" />
</div>


<div class="form-group">
<label>Confirm Password</label>
<input class="form-control"  type="password" name="confirmpassword"   autocomplete="off"  />
</div>

<input type="submit"  class="btn btn-info" value="confirm" name="confirm"/>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="assets/js/bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="assets/js/custom.js"></script>
</body>
</html>
