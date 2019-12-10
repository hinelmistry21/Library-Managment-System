<?php
session_start();
if($_SESSION['login'])
 include('includes/header.php');
else
 echo '<script type="text/javascript">location.href = "index.php";</script>';
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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Digital Library Management System | USER</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
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
        <div class="container">
            <div class="row ">
                <div class="col-md-14">
                    <div class="navbar-collapse collapse " style="padding: 2%" >
                        <div style="margin-left:18% ">
                

    <!--   <input type="text" placeholder="Search user..." id="search_text" name="search_text" class="round" style="width: 60%;height:4.5%;margin-left: 15px;margin-top: 0.7%">  -->
     <!-- Search bar -->
 <input type="text" placeholder="Search user..." id="search_text" name="search_text" class="round" style="width: 60%;height:5.5%;margin-left: 15px;">

   <input type="submit" class="btn btn-info" value="ISSUED BOOKS" id="displaybtn" name="displaybtn" style="margin-left: 1%;" >
                          
  
                     </div>
                 </div>

             </div>
         </div>
     </section>
    <!-- This will be generating the table of the books-->
     <div id="result">

    </div>


</body>
<?php include('user.js');?>

      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</html>