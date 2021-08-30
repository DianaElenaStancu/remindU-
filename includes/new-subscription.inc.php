<?php
  if(isset($_POST["submit"])){
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    session_start();
    $user_id =  $_SESSION['userid'];
    $subscription_name = $_POST["subscription"];
    $date = $_POST["payDay"];
    $friendName = $_POST['FriendName'];
    $friendEmail = $_POST['FriendEmail'];

    $_SESSION['message'] = "Successfully Submitted!";

    foreach($friendEmail as $email)
      if(invalidEmail($email) !== false) {
          $_SESSION['message'] = "Invalid email! Please try again.";
          header("location: ../planner.php");
          exit();
    }

    if(emptyInputNewSubscription($subscription_name, $date, $friendName, $friendEmail) !== false) {
      $_SESSION['message'] = "Fill in all the fields!";
      header("location: ../planner.php");
      exit();
    }

    $stmt = mysqli_stmt_init($conn);
    createSubscription($stmt, $conn, $user_id, $subscription_name, $date);
    $subscription_id = getSubscriptionId($stmt);
    for($id = 0; $id < count($friendName); $id++)
    {
      $name = $friendName[$id];
      $email = $friendEmail[$id];
      createSubscriber($stmt, $conn, $subscription_id, $name, $email);
    }
    mysqli_stmt_close($stmt);
    exit();
  }
  else{
    header("location: ../planner.php");
    exit();
  }
