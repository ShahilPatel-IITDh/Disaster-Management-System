<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Disaster Management System</title>
</head>
<meta charset="UTF-8">
<title>Add Result</title>
</head>
<body style="background-color: #FFF5EB">
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="adminHome.jsp" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use href="logo.jpeg"/></svg>
        <span class="fs-4" style="color:#504538;">Disaster Management System</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="Home.jsp" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"> 
        <form class="navbar-form" action = "DisplayHospital" method = POST>
				<button type="submit" class="btn text-primary">Hospital</button>
			</form>
        </li>
        <li class="nav-item"> 
        <form class="navbar-form" action = "DisplayRationShop" method = POST>
				<button type="submit" class="btn text-primary">Ration Shop</button>
			</form>
        </li>
        <li class="nav-item"> 
        <form class="navbar-form" action = "Volunteer" method = POST>
				<button type="submit" class="btn text-primary">Volunteer</button>
			</form>
        </li>
      </ul>
    </header>
  </div>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div style="width: 60%;" class="container">
    <center><h3 class="mt-5" style="color:#2f4858; text-align:center; font-size:60px">Volunteer has been added successfully!</h3></center>
  	  <div class="wrapper">
    </div>
  </div>
</main>


</body>
</html>