<?php
session_start();
if($_SESSION['login'])
{
 include('includes/header.php');
 include('includes/config.php');

}
else
{ 
    echo '<script type="text/javascript">location.href = "index.php";</script>';
}

if(isset($_POST['REMOVE']))
{
$id=$_POST['user_id'];
    if(is_numeric($id)){
        if($id!=489){
            $query = "DELETE FROM teacher WHERE TeacherId='$id'";
           
            $data = mysqli_query($conn,$query);
            if($data)
            {
            echo "<script type='text/javascript'> alert('Employee Removed'); </script>";
            }  
        }
        else{
            echo "<script type='text/javascript'> alert('You cannot delete admin'); </script>";
        }

    }
    else{
    $query = "DELETE FROM student WHERE StudentId='$id'";
    echo"$query";
    $data = mysqli_query($conn,$query);
        if($data)
        {
        echo "<script type='text/javascript'> alert('Student Removed'); </script>";
        }
    }
}

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
.round {
border-radius: 5px;
border: 1px #000 solid;
padding: 5px 5px 10px 25px;
top: 0;
left: 0;
z-index: 5;
}
</style>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Admin Login</title>
  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></-->
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
   <script
  src="http://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
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
      <section class="menu-section">
       <!--  <div class="container"> -->
            <div class="row ">
                <div class="col-md-14" >
                    <div class="navbar-collapse collapse " style="padding: 2%">             
                 <div style="margin-left: 12%">
                <ul class="nav navbar-nav" >
                    <!-- Dropdown menu 1 -->
        <li class="dropdown">
          <button  type="button"  class="btn btn-info
          dropdown-toggle" data-toggle="dropdown"aria-haspopup="true"
          aria-expanded="false" > SELECTION
          </button>

          <ul class="dropdown-menu"> 
          <li><a id="bookname">Bookname</a></li>
          <li><a id="student">Students</a></li>
          <li><a id="faculty">Faculty</a></li>
          </ul>

        </li>
      </ul>
      <!-- Search bar -->
 <input type="text" placeholder="Search" id="search_text" name="search_text" class="round" style="width: 60%;height:5.5%;margin-left: 1.3%;">

           <!-- Dropdown menu 2 -->
           <ul class="nav navbar-nav navbar-right" style="margin-right:23.5%;margin-left:1%; ">
           <li class="dropdown">
          

          <button  type="button" class="btn btn-info
          dropdown-toggle " data-toggle="dropdown"aria-haspopup="true"
          aria-expanded="false" > MORE
          </button>

          <ul class="dropdown-menu " > 
          <li><a href="bookgeneration.php">BOOK GENERATION</a></li>
          <li><a href="removeuser.php">REMOVE USER</a></li>
          <li><a href="removebook.php">REMOVE BOOK</a></li>
          </ul>

        </li>
    </ul>
            </div>
                     </div>
                 </div>

             </div>
         
     </section>
      <!-- This will be generating the table of the books-->
     <div id="result">
     <div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">USER REMOVE FORM</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->          
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 Enter Details
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter User ID</label>
<input class="form-control" type="text" name="user_id" required autocomplete="off" />
</div>
 
<input type="submit" name="REMOVE" class="btn btn-info" value="REMOVE" id="REMOVE"/>
<button type="Reset" name="cancel" class="btn btn-info"><a href="admin_login.php" style="color:white; text-decoration:none" >CANCEL</a></button>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>

     </div>

</body>
<?php include('student.js');?>
<?php include('book.js');?>
<?php include('faculty.js');?>




     <!-- FOOTER SECTION END-->
    <!--script src="assets/js/jquery-1.10.2.js"></script-->
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</html>
