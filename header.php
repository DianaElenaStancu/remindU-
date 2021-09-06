<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang = "en" dir = "ltr">
  <head>
      <meta charset = "utf-8">
      <title> remindU </title>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
      <link rel="shortcut icon" type="image/png" href="img/logo_sm_white.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
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
