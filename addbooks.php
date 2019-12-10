<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if($_SESSION['login']){
 include('includes/header.php');
 include('includes/config.php');
}
else{
 echo '<script type="text/javascript">location.href = "index.php";</script>';
}

if(isset($_POST['ADD']))
{
  $myfile = fopen("RFIDB.txt", "r") or die("Unable to open file!");
  $tagr= fread($myfile,filesize("RFIDB.txt"));  
  fclose($myfile);
  $tag=hexdec($tagr);
  if($tag!=null){
    $bookavailable=$_POST['book_avai'];
    $bookname=$_POST['book_name'];
    $bookauthor=$_POST['author_name'];
    $bookedition=$_POST['book_edition'];
    $data = mysqli_query($conn,"CALL sp_Bookadd('$bookname','$bookauthor','$bookedition','$bookavailable','$tag')");
      if($data)
      {
          echo "<script type='text/javascript'> alert('Data Inserted Successfully with RFID'); </script>";
          header( "Location: employee_login.php" );
      }
  }
  else{
    $bookavailable=$_POST['book_avai'];
    $bookname=$_POST['book_name'];
    $bookauthor=$_POST['author_name'];
    $bookedition=$_POST['book_edition'];
    $data = mysqli_query($conn,"CALL sp_Bookadd('$bookname','$bookauthor','$bookedition','$bookavailable',0)");
      if($data)
      {
          echo "<script type='text/javascript'> alert('Data Inserted Successfully without RFID It can be changed with Relink books'); </script>";
          header( "Location: employee_login.php" );
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
  <title>Digital Library Management System | EMPLOYEE</title>

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
          <li><a href="#" id="bookname">BOOKNAME</a></li>
          <li><a href="#" id="student">STUDENT</a></li>
          <li><a href="#" id="faculty">FACULTY</a></li>
          
          </ul>

        </li>
      </ul>
      <!-- Search bar -->
 <input type="text" placeholder="Search user..." id="search_text" name="search_text" class="round" style="width: 60%;height:5.5%;margin-left: 15px">

           <!-- Dropdown menu 2 -->
           <ul class="nav navbar-nav navbar-right" style="margin-right: 19.9%;margin-left:0.01%;">
           <li class="dropdown">
          

          <button  type="button" class="btn btn-info
          dropdown-toggle " data-toggle="dropdown"aria-haspopup="true"
          aria-expanded="false" >DATA ENTRY
          </button>

          <ul class="dropdown-menu " > 
          <li><a href="linkbooks.php">LINK/RELINK BOOKS</a></li>
          <li><a href="linkusers.php">LINK/RELINK USERS</a></li>
          <li><a href="issuebook.php">ISSUE BOOKS</a></li>
          <li><a href="returnbook.php">RETURN BOOKS</a></li>
          <li><a href="addbooks.php">ADD BOOKS</a></li>
         
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

    <div class="content-wrapper" id="book_tag">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">BOOK TAG GENERATION FORM</h4>
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
<label>Enter Book Name</label>
<input class="form-control" type="text" name="book_name" required autocomplete="off" />
</div>


<div class="form-group">
<label>Enter Book Edition</label>
<input class="form-control" type="number" name="book_edition" required autocomplete="off"  />
</div>

<div class="form-group">
<label>Enter Book Availability</label>
<input class="form-control" type="number" name="book_avai" required autocomplete="off"  />
</div>

<div class="form-group">
<label>Enter Author Name</label>
<input class="form-control" type="text" name="author_name" required autocomplete="off"  />
</div>


 <input type="submit" name="ADD" class="btn btn-info" value="ADD" id="ADD"/> 
 <button type="Reset" name="cancel" class="btn btn-info"><a href="employee_login.php" style="color:white; text-decoration:none" >CANCEL</a></button> 
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
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</html>
