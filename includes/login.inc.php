<?php
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

   $username = $_POST["username"];
   $pwd = $_POST["pwd"];


   if(emptyInputLogin($username, $pwd) === true) {
     echo "<p class=\"alert alert-danger\" role=\"alert\">Fill in all fields!</p>";
     exit();
   }

   loginUser($conn, $username, $pwd);
