<?php
session_start();

include("connection.php");

$msg = "";
if (isset($_POST['submit'])) {

  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  $query = "SELECT `Id`, `Firstname`, `Lastname`, `Email`, `Password`, `Confirmation`, `Country`, `Image`, `Gender`, `Date` FROM `user` WHERE  Email = '$email' AND Password = '$password'";

  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

  $count = mysqli_num_rows($result);
  if ($count <= 0) {

    $msg = "Incorect Email or Password";
  } else {
    $_SESSION['username'] = $row['Firstname']."".$row['Lastname'];
    header("Location: main.php");
  }

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

  <nav class="navbar bg-body-tertiary ">
    <div class="container-fluid">
      <a class="navbar-brand"> <b>VIRGILE</b></a>
      <div class="d-flex">
        <button type="button" class="btn btn-primary fw-bolder" onclick="window.location='index.html'">Home</button>&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-success fw-bolder" onclick="window.location='signup.php'">Signup</button>
      </div>
    </div>
  </nav>


  <br><br><br>


  <div class="container col-8">
    <p class="fs-1 text-center fw-bolder text-success">Login</p>
    <form class="row g-3" action="login.php" method="POST" onsubmit="return LoginValidation()">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off">
        <label for="email">Email</label>
        <div id="emailError" class="form-text text-danger fw-bolder"> </div>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" autocomplete="off">
        <label for="password">Password</label>
        <div id="passwordError" class="form-text text-danger fw-bolder"> <?php echo $msg; ?> </div>
      </div>
      <div class="col-12 d-flex justify-content-center">
        <button class="btn btn-success fw-bolder" type="submit" name="submit">Submit</button>

      </div>
    </form>
  </div>

  <script src="script.js"></script>

</body>

</html>