<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<title>Volunteer Registration</title>
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
         <li class="nav-item"><a href="Login.jsp" class="nav-link">Login </a></li>
      </ul>
    </header>
  </div>

  <main class="flex-shrink-0">
  <div style="width: 60%;" class="container">
    <h1 class="mt-5" style="color:#2f4858; text-align:center; font-size:60px">Volunteer Registration Form</h1>
    <p class="lead" style="color:#504538; font-size:25px; text-align:center">Please fill the form to proceed</p>
    <form action="AddVolunteer" method="POST">
          <div class="mb-3">
            <label class="form-label">Id</label>
            <input type="number" required name="Id" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" required name="Name" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" required name="Age" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Gender</label>
            <input type="text" required name="Gender" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Area</label>
            <input type="text" required name="Area" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Contact Number</label>
            <input type="text" required name="Contact" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
     </form>
  </div>
</main>


</body>
</html>
