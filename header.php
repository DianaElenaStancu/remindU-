<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang = "en" dir = "ltr">
  <head>
      <meta charset = "utf-8">
      <title> remindU </title>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
      <link rel="shortcut icon" type="image/png" href="img/logo_sm_white.png">
      <link rel="stylesheet" href="css/reset.css">
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
