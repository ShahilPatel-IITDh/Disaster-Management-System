<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>IIT Blood Bank</title>
</head>
<meta charset="UTF-8">
<title>Table Display Window</title>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="Home.jsp" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use href="logo.jpeg"/></svg>
        <span class="fs-4">IIT Blood Bank</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="adminHome.jsp" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item">
	        <form class="navbar-form" action = "DisplayDonors" method = POST>
				<button type="submit" class="btn text-primary">Donors</button>
			</form>
		</li>
        <li class="nav-item"> 
        <form class="navbar-form" action = "DisplayRequests" method = POST>
				<button type="submit" class="btn text-primary">Requests</button>
			</form>
        <li class="nav-item">
        <li class="nav-item"><a href="compatDisplay.jsp" class="nav-link" aria-current="page">Compatibility Chart</a></li>
        <li class="nav-item"><a href="newDonation.jsp"class="nav-link">New Donation </a></li>
        <li class="nav-item"><a href="processRequest.jsp" class="nav-link">Process request </a></li>
        <li class="nav-item"> 
        <form class="navbar-form" action = "viewBloodStock" method = POST>
				<button type="submit" class="btn text-primary">Blood Stock</button>
			</form>
        <li class="nav-item">
        <li class="nav-item"> 
        <form class="navbar-form" action = "viewPast" method = POST>
				<button type="submit" class="btn text-primary">Past Transfusions</button>
			</form>
        <li class="nav-item">
         <li class="nav-item"><a href="Home.jsp" class="nav-link">Logout </a></li>
      </ul>
    </header>
  </div>

<main class="flex-shrink-0">
  <div style="width: 60%;" class="container">
    <h1 class="mt-5">Welcome to the admin page!</h1>
    <p class="lead">Please select an option from navbar to proceed</p>
  </div>
</main>
<div class="fixed-bottom container">
  <footer class="py-3 my-4">
    <hr/>
    <p class="text-center text-muted">&copy; IIT Dharwad, 2021</p>
  </footer>
</div>
</body>
</html>