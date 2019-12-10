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
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Admin Login</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
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
                    <div class="navbar-collapse collapse " style="padding: 10px">             
                 <div style="margin-left: 12%">
                <ul class="nav navbar-nav" style="margin-top: 12px">
                    <!-- Dropdown menu 1 -->
        <li class="dropdown">
          <button  type="button" style="margin-left: 14px" class="btn btn-info
          dropdown-toggle" data-toggle="dropdown"aria-haspopup="true"
          aria-expanded="false" > SELECTION
          </button>

          <ul class="dropdown-menu"> 
          <li><a href="admin_login.php">Bookname</a></li>
          <li><a href="#">Students</a></li>
          </ul>

        </li>
      </ul>
      <!-- Search bar -->
 <input type="text" placeholder="Search user..." id="search_text" name="search_text" class="round" style="width: 60%;height:5.5%;margin-left: 15px">
<!-- Search button (fontAwesome) --> <button style="margin: 12px" class="btn btn-info" type="button" onclick=""><span
    class="glyphicon glyphicon-search" aria-hidden="true"> </span>
SEARCH</button>  
           <!-- Dropdown menu 2 -->
           <ul class="nav navbar-nav navbar-right" style="margin-right: 13%;padding-left:-0.5px;margin-left: 0.5px; margin-top: 12px">
           <li class="dropdown">
          

          <button  type="button" class="btn btn-info
          dropdown-toggle " data-toggle="dropdown"aria-haspopup="true"
          aria-expanded="false" > MORE
          </button>

          <ul class="dropdown-menu " > 
          <li><a href="#" >BLOCK USER</a></li>
          <li><a href="#">BOOK GENERATION</a></li>
          <li><a href="#">PENALTY</a></li>
          <li><a href="#">REMOVE USER</a></li>
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

     </div>
<script>

  $(document).ready(function(){
    $('#search_text').keyup(function(){
      var txt=$(this).val();
      
      if(txt != '')
      {
        $('#result').html('');
         $.ajax({
           url:"fetch.php",
           method:"post",
           data:{search:txt},
           dataType:"text",
           success:function(data)
           {
            $('#result').html(data);
           }
         });
      }
      else
      { }
    });
  })
  </script>
</body>
     <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</html>
