<?php
require 'dbh.inc.php';

if (isset($_POST["reset-password-submit"])) {

  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $password = $_POST["pwd"];
  $passwordRepeat = $_POST["pwd-repeat"];

  if (empty($password) || empty($passwordRepeat)) {
    header("Location: ../create-new-password.php?newpwd=empty");
    exit();
  }
  else if($password != $passwordRepeat){
    header("Location: ../create-new-password.php?newpwd=empty");
    exit();
  }

  $currentDate = date("U");

  $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? and pwdResetExpires >= ?";
  $stmt = mysqli_stmt_init($conn);
  print_r($stmt);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
  } else {
    print_r($selector);
    mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if(!$row = mysqli_fetch_assoc($result)) { // grab the data
      echo "You need to re-submit your reset request1.";
      exit();
    }
    else {

      $tokenBin = hex2bin($validator);
      $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

      if ($tokenCheck === false) {
        echo "You need to re-submit your reset request2.";
        exit();
      }
      else if($tokenCheck === true) {

        $tokenEmail = $row['pwdResetEmail'];

        $sql = "SELECT * FROM users WHERE usersEmail=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          echo "There was an error!";
          exit();
        }
        else{
          mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if(!$row = mysqli_fetch_assoc($result)) { // grab the data
            echo "There was an error!";
            exit();
          }
          else {

            $sql = "UPDATE users SET usersPwd=? WHERE usersEmail=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
              echo "There was an error!";
              exit();
            }
            else{
              $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
              mysqli_stmt_execute($stmt);

              $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "There was an error!";
                exit();
              }
              else{
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);
                header("Location:../login.php?newpwd=passwordupdated");
              }
            }
          }
        }

      }

    }
  }
}
else{
  header("Location: ../index.php");
}
