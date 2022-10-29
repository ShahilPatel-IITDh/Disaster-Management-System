<?php 
session_start();
include('../connection.php');
$admin= $_SESSION['admin'];
if($admin=="")
{
header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" style="background:#f5f5f5;border-bottom:1px solid #eee;
">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Simple Loan Management System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           
            <li><a href="logout.php">Logout</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <!--<li ><a href="index.php">Dashboard <span class="sr-only">(current)</span></a></li>-->
			<!-- find users' image if image not found then show dummy image -->
			
			
            <li><a href="#"><img style="border-radius:20px" src="../images/adminicon.jpg" width="100" height="100" alt="not found"/></a></li>
			
			
			
	<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>		
	<!-- <li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-lock"></span> Update Password</a></li> -->
    <li><a href="index.php?page=display_group"><span class="glyphicon glyphicon-user"></span>  Groups</a></li>
	<li><a href="index.php?page=display_member"><span class="glyphicon glyphicon-user"></span>  Members</a></li>
	<li><a href="index.php?page=display_loan"><span class="glyphicon glyphicon-usd"></span> Loan</a></li>
	<li><a href="index.php?page=display_payment_history"><span class="glyphicon glyphicon-time"></span> Payment</a></li>
			
            
          </ul>
         
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!-- container-->
		  <?php 
		@$page=  $_GET['page'];
		  if($page!="")
		  {
		  	if($page=="add_group")
			{
				include('add_group.php');
			
			}
		  	if($page=="display_group")
			{
				include('display_group.php');
			
			}
			if($page=="search_group")
			{
				include('search_group.php');
			
			}
			
			if($page=="update_group")
			{
				include('update_group.php');
			
			}
			if($page=="display_member")
			{
				include('display_member.php');
			
			}
			if($page=="search_member")
			{
				include('search_member.php');
			
			}
			
			if($page=="add_group_member")
			{
				include('add_group_member.php');
			
			}
			
			if($page=="update_group_member")
			{
				include('update_group_member.php');
			
			}
			
			if($page=="add_loan")
			{
				include('add_loan.php');
			
			}
			
			if($page=="display_loan")
			{
				include('display_loan.php');
			
			}
			
			if($page=="search_loan")
			{
				include('search_loan.php');
			
			}
			
			if($page=="update_loan_record")
			{
				include('update_loan_record.php');
			
			}
			
			if($page=="display_payment_history")
			{
				include('display_payment_history.php');
			
			}
			
			if($page=="add_payment_history")
			{
				include('add_payment_history.php');
			
			}
			
			if($page=="update_password")
			{
				include('update_password.php');
			
			}
			
			
			
			
			
			
		  }
		  
		  else
		  {
		 include('dashboard.php');
		 
		 }
		  ?>
		  

         
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
