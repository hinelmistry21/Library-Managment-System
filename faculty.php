<?php 
session_start();
include('includes/config.php');
if(isset($_POST['register']))
{
$email=$_POST['email'];
$_SESSION['email']=$email;
include('faculty_process.php');
}
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>Digital Library Management System | Teacher Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript">
        function valid()
        {
            if(document.signup.password.value!= document.signup.confirmpassword.value)
            {
                alert("Password and Confirm Password Field do not match  !!");
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }

        function validemail()
        {
            var emailfetch=document.getElementById('email').value;//fetch the email
            var check="@charusat.ac.in"//for comparing
            var n=emailfetch.indexOf("@");//fetch the index number of @
            var domain=emailfetch.substr(n,15);//it will store @charusat.ac.in
            var lowerdomain=domain.toLowerCase();
            if(lowerdomain!=check)
            {
                alert("Please Enter Correct Format Eg:abc.ab@charusat.ac.in");
                return false;
            }
            return true;
        }

        function validoption()
        {
            var emailfetch=document.getElementById('email').value;//fetch the email
            var n=emailfetch.indexOf(".");//display position of .
            var m=emailfetch.substr(n,3);
            var dept=m.substr(1,2);
            var lower=dept.toLowerCase();
            var selector = document.getElementById('myList');
           var value = selector[selector.selectedIndex].value;
            if(lower!=value)
            {
                alert("Please Select Appropriate Department");
                return false;
            }
            return true;
        }
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
                <h4 class="header-line">Faculty Signup</h4>
                
            </div>

        </div>
        <div class="row">
         
            <div class="col-md-9 col-md-offset-1">
             <div class="panel panel-danger">
                <div class="panel-heading">
                 SINGUP FORM
             </div>
             <div class="panel-body">
                <form name="signup" method="post" onSubmit="return !!(validemail(this) & validoption() & valid());">
                    <div class="form-group">
                        <legend>Enter ID</legend>
                        <input class="form-control" type="text" name="idno" autocomplete="off"  pattern="^[0-9]{3,4}$" title="Please Enter only Numbers" required />
                    </div>

                    <div class="form-group">
                        <legend>Enter Email</legend>
                        <input class="form-control" type="text" name="email" autocomplete="off" id="email" required />
                    </div>

                    <div class="form-group">
                        <legend>Enter Department</legend>
                        <select id = "myList" name="myList">
                               <option value = "ce">Computer Engineering</option>
                               <option value = "me">Mechanical Engineering</option>
                               <option value = "cl">Civil Engineering</option>
                               <option value = "ee">Electrical Engineering</option>
                               <option value = "ec">Electronic and Communication Engineering</option>
                             </select>
                    </div>


<div class="form-group">
    <legend>Enter Password</legend>
    <input class="form-control" type="password" name="password" autocomplete="off" required  />
</div>

<div class="form-group">
    <legend>Confirm Password </legend>
    <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
</div>

<input type="submit"  class="btn btn-danger" value="Register" name="register"/>
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
