<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    session_start();
    $user_id =  $_SESSION['userid'];
    $subscription = $_POST["subscription"];
    $date = $_POST["date"];
    $friendName = $_POST['FriendName'];
    $friendEmail = $_POST['FriendEmail'];

    //echo "<br>.$date.</br>";
    //echo "<br>.$friendName[0].</br>";

    foreach($friendEmail as $email)
      if(validEmail($email) === false) {
          echo "Invalid email! Please try again.";
          exit();
    }

    if(emptyInputNewSubscription($subscription, $date, $friendName, $friendEmail) !== false) {
      echo "<p class=\"alert alert-danger\" role=\"alert\">Fill in all the fields!</p>";
      exit();
    }

    $stmt = mysqli_stmt_init($conn);
    createSubscription($stmt, $conn, $user_id, $subscription, $date);
    $subscription_id = getSubscriptionId($stmt);
    for($id = 0; $id < count($friendName); $id++)
    {
      $name = $friendName[$id];
      $email = $friendEmail[$id];
      createSubscriber($stmt, $conn, $subscription_id, $name, $email);
    }
    mysqli_stmt_close($stmt);
    exit();
