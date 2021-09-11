<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    session_start();
    $error = false;
    $user_id =  $_SESSION['userid'];
    $subscription = $_POST["subscription"];
    $date = $_POST["date"];
    $billing_frequency = $_POST['billing_frequency'];


    if(isset($_POST['friendName']) && isset($_POST['friendEmail'])){
      $friendName = $_POST['friendName'];
      $friendEmail = $_POST['friendEmail'];
      $subscribers = true;
    }
    else
      $subscribers = false;

    if($billing_frequency === "Default"){
      echo "<p class=\"alert alert-danger\" role=\"alert\">Choose you billing frequency!</p>";
      exit();
    }

    if(empty($subscription) || empty($date)) {
      echo "<p class=\"alert alert-danger\" role=\"alert\">Fill in all the fields!</p>";
      exit();
    }

    if($subscribers){
      foreach($friendEmail as $email)
        if(empty($email)){
          echo "<p class=\"alert alert-danger\" role=\"alert\">Fill in all the fields!</p>";
          exit();
        }
        else if(validEmail($email) === false) {
          echo "<p class=\"alert alert-danger\" role=\"alert\">Invalid email! Please try again.</p>";
          exit();
        }

      foreach($friendName as $name)
        if(empty($name)){
          echo "<p class=\"alert alert-danger\" role=\"alert\">Fill in all the fields!</p>";
          exit();
        }
        else if(validUid($name) === false) {
          echo "<p class=\"alert alert-danger\" role=\"alert\">Please use (a) proper name(s).</p>";
          exit();
        }
    }

    $stmt = mysqli_stmt_init($conn);


    if(!createSubscription($stmt, $conn, $user_id, $subscription, $date, $billing_frequency))
      $error = true;

    $subscription_id = getSubscriptionId($stmt);

    if($subscribers){
      for($id = 0; $id < count($friendName); $id++)
      {
        $name = $friendName[$id];
        $email = $friendEmail[$id];
        if(!createSubscriber($stmt, $conn, $subscription_id, $name, $email))
          $error = true;
      }
    }


    if($error)
      echo "<p class=\"alert alert-danger\" role=\"alert\">Something went wrong! Please try again.</p>";
    else
      echo "<p class=\"alert alert-success\" role=\"alert\">Subscription added successfully!</p>";


    mysqli_stmt_close($stmt);
    exit();
