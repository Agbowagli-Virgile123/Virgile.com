<?php
include("connection.php");

$msg =  $imageName = "";

if (isset($_POST['submit'])) {
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $conPassword = mysqli_real_escape_string($conn, $_POST['conPassword']);
  $country = mysqli_real_escape_string($conn, $_POST['country']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);

  if (isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $imageName = $image['name'];

    $imagePath = "uploads/" . $imageName;

    move_uploaded_file($image['tmp_name'], $imagePath);
  }


  $query = "INSERT INTO user(`Firstname`, `Lastname`, `Email`, `Password`, `Confirmation`, `Country`, `Image`, `Gender`) VALUES ('$firstname','$lastname','$email','$password','$conPassword','$country','$imageName','$gender')";

  mysqli_query($conn, $query);

  echo "<div class=\"alert alert-success\" role=\"alert\">
            Account Created Successfully!!!
        </div>";
  header("Location:login.php");

  mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Validation</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand"> <b>VIRGILE</b></a>
      <div class="d-flex">
        <button type="button" class="btn btn-primary fw-bolder" onclick="window.location='index.html'">Home</button>&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-success fw-bolder" onclick="window.location='login.php'">Login</button>
      </div>
    </div>
  </nav><br><br>

  <div class="form-text text-success fw-bolder"> <?php echo $msg ?> </div> <br>

  <div class="container col-8">
    <p class="fs-1 text-center fw-bolder text-primary">Registration</p>
    <form class="row g-3" action="signup.php" method="POST" onsubmit=" return SignupValidation()" enctype="multipart/form-data">

      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="firstname" placeholder="Firstname" name="firstname" autocomplete="off">
        <label for="firstname">Firstname</label>
        <div id="firstnameError" class="form-text text-danger fw-bolder"> </div>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="lastname" name="lastname" autocomplete="off" placeholder="Lastname">
        <label for="lastname">Lastname</label>
        <div id="lastnameError" class="form-text text-danger fw-bolder"> </div>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off">
        <label for="email">Email</label>
        <div id="emailError" class="form-text text-danger fw-bolder"> </div>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" autocomplete="off">
        <label for="password">Password</label>
        <div id="passwordError" class="form-text text-danger fw-bolder"> </div>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="conPassword" placeholder="Confirm Password" name="conPassword" autocomplete="off">
        <label for="conPassword">Confirm Password</label>
        <div id="conPasswordError" class="form-text text-danger fw-bolder"> </div>
      </div>

      <div class="form-floating">
        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="country" id="country">
          <option value="default">Select Your Country</option>
          <option value="Benin">Benin</option>
          <option value="Ghana">Ghana</option>
          <option value="Nigeria">Nigeria</option>
          <option value="Niger">Niger</option>
          <option value="Burkina Faso">Burkina Faso</option>
          <option value="Togo">Togo</option>
          <option value="USA">USA</option>
          <option value="UK">UK</option>
          <option value="France">France</option>
          <option value="Spain">Spain</option>
          <option value="Dubai">Dubai</option>
        </select>
        <div id="countryError" class="form-text text-danger fw-bolder"> </div>
      </div>

      <div>
        <input class="form-control form-control-lg" id="image" type="file" name="image" accept="image/*">
        <div id="imageError" class="form-text text-danger fw-bolder"> </div>
      </div>

      <div class="d-flex justify-content-around">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
          <label class="form-check-label" for="male">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
          <label class="form-check-label" for="female">
            Female
          </label>
        </div>
        <div id="genderError" class="form-text text-danger fw-bolder"> </div>
      </div>

      <div class="col-12 d-flex justify-content-center">
        <button class="btn btn-primary fw-bolder" type="submit" name="submit">Submit</button>
      </div>

    </form>
  </div>
  <script src="script.js"></script>

</body>

</html>