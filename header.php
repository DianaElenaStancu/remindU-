<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang = "en" dir = "ltr">
  <head>
      <meta charset = "utf-8">
      <title> remindU </title>

      <link rel="shortcut icon" type="image/png" href="img/logo_sm_white.png">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
      <script src="js/script.js"></script>
      <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php"> <img src="img/logo_resized.png" width="25%" alt="logo"></a>
        <ul class="nav justify-content-end">
          <li class = "nav-item"> <a class="nav-link" href="index.php">Home</a></li>
          <li class = "nav-item"> <a class="nav-link" href="discover.php">About us</a></li>
          <?php
            if(isset($_SESSION["useruid"])){
              echo "<li class = \"nav-item\"> <a class=\"nav-link\" href='planner.php'>Planner page</a></li>";
              echo "<li class = \"nav-item\"> <a class=\"nav-link\" href='profile.php'>Profile page</a></li>";
              echo "<li class = \"nav-item\"> <a class=\"nav-link\" href='includes/logout.inc.php'>Log out</a></li>";
            }
            else {
              echo "<li class = \"nav-item\"> <a class=\"nav-link\" href='signup.php'>Sign up</a></li>";
              echo "<li class = \"nav-item\"> <a class=\"nav-link\" href='login.php'>Log in</a></li>";
            }
           ?>
    </nav>
