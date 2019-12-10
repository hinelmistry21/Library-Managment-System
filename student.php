<?php 

session_start();

if(isset($_POST['register']))
{
$id=strtolower($_POST['idno']);
$_SESSION['idno']=$id;
include('student_process.php');

}
error_reporting(E_ERROR | E_PARSE);
include('includes/config.php');
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
    <title>Digital Library Management System | Student Signup</title>
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
        function validid()
        {

            var today=new Date(); 
            var date=today.getFullYear();//fetch the year
            var newdate=date-3;//reduce the year by 3
            var date1=date.toString();//convert the interger into string
            var str=date1.substr(2,2);//fetch only last two digit of the year
            var newdate1=newdate.toString();//convert the interger into string
            var str1=newdate1.substr(2,2);//fetch only last two digit of the year


            var idno=document.getElementById('idno').value;
            var d2d=idno.substr(0,1);
            var year=document.getElementById('year').value;
            if(d2d=="d" || d2d=="D")
            {
            	var idno1=idno.substr(1,2);//fetch first two digit of id
                //var year=document.getElementById('year').value;
                idno1=idno1-1;
                var year1=year.substr(2,2);//fetch last two digit of enter year
                year1=year1-1;


            }
            else
            {

            var idno1=idno.substr(0,2);//fetch first two digit of id
            var year1=year.substr(2,2);//fetch last two digit of enter year
            }
            
            
            if(idno1==year1)
            {
              if(idno1<str1 || idno1>str)
              {
                alert("You Are Not Ilegibale for Registration");
                window.location = "student.php";
                return false;
              }
              return true;
            }
            else
            {
              alert("Please Enter Correct Year");
              return false;
            }
            return true;
        }  

        function validoption()
        {
           var selector = document.getElementById('myList');
           var value = selector[selector.selectedIndex].value;
           var idno=document.getElementById('idno').value;
           var d2d=idno.substr(0,1);
           if(d2d=="d" || d2d=="D")
           {
           var dept=idno.substr(3,2);//fetch first two digit of dept
           }
           else
           {
            var dept=idno.substr(2,2);//fetch first two digit of dept
           }
            var lower=dept.toLowerCase();
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
                <h4 class="header-line">Student Signup</h4>
                
            </div>

        </div>
        <div class="row">
         
            <div class="col-md-9 col-md-offset-1">
             <div class="panel panel-danger">
                <div class="panel-heading">
                 SINGUP FORM
             </div>
             <div class="panel-body">
                <form name="signup" method="post" onSubmit="return !!(validid(this) & validoption() & valid());" >
                    <div class="form-group">
                        <legend>Enter ID</legend>
                        <input class="form-control" type="text" name="idno" id="idno" autocomplete="off" pattern="^([Dd]{1}[0-9]{2}[a-zA-Z]{2}[0-9]{3})|([0-9]{2}[a-zA-Z]{2}[0-9]{3})$" title="Please enter valid format.Eg(d19ce000 or 17ce000)" required />
                    </div>

                    <div class="form-group">
                        <legend>Enter Year</legend>
                        <input class="form-control" type="text" name="year" id="year" autocomplete="off" required />
                    </div>

                    <div class="form-group">
                        <legend>Enter Department</legend>
                        <select id = "myList" name="myList" class="myList">
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

<input type="submit"  class="btn btn-danger" value="Register" name="register"  />
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
