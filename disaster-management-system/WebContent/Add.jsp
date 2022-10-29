<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<title>Donor Registration</title>
</head>

<body>
    <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="Home.jsp" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use href="logo.jpeg"/></svg>
        <span class="fs-4">IIT Blood Bank</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="Home.jsp" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="Add.jsp" class="nav-link active">Donor Registration</a></li>
        <li class="nav-item"><a href="Issue.jsp" class="nav-link">Request for Blood</a></li>
        <li class="nav-item"><a href="Login.jsp" class="nav-link">Login</a></li>
      </ul>
    </header>
  </div>

  <main class="flex-shrink-0">
  <div style="width: 60%;" class="container">
    <h1 class="mt-5">Donor Registration Form</h1>
    <p class="lead">Please fill the form to proceed</p>
    <form action="AddServlet" method="POST">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" required name="name" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Gender</label>
            <input type="text" required name="gender" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Date of Birth</label>
            <input type="date" required name="date" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" required name="address" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Blood Type</label>
            <select class="form-select" name="bloodtype" required>
            	<option selected>Choose One from Dropdown</option>
				<option value = "1"> O +ve </option>
				<option value = "2"> O -ve </option>
				<option value = '3'> A +ve </option>
				<option value = "4"> A -ve </option>
				<option value = "5"> B +ve </option>
				<option value = "6"> B -ve </option>
				<option value = "7"> AB +ve </option>
				<option value = "8"> AB -ve </option>
			</select>
          </div>
           <div class="mb-3">
            <label class="form-label">Smoker</label>
            <select class="form-select" name="isSmoker" required>
            	<option selected>Choose One from Dropdown</option>
				<option value = 0> No</option>
				<option value = 1> Yes </option>
			</select>
          </div>
          <div class="mb-3">
            <label class="form-label">Major Diseases</label>
            <select class="form-select" name="diseases" required>
            	<option selected>Choose One from Dropdown</option>
				<option value = 0> No</option>
				<option value = 1> Yes </option>
			</select>
          </div>
          <div class="mb-3">
            <label class="form-label">Contact Number</label>
            <input type="number" required name="contactno" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
     </form>
  </div>
</main>
    
        <div class="container">
  <footer class="py-3 my-4">
    <hr/>
    <p class="text-center text-muted">&copy; IIT Dharwad, 2021</p>
  </footer>
</div>
</body>
</html>
