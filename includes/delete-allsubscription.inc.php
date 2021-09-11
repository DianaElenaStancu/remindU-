<?php
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  session_start();
  $user_id =  $_SESSION['userid'];
  $deleteSubscriptions = "DELETE FROM subscriptions WHERE user_id = $user_id;";
  $selectSubscription = "SELECT id FROM subscriptions WHERE user_id = $user_id;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $selectSubscription)){
    echo "Something went wrong". $conn->error;
    exit();
  }
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while ($row = mysqli_fetch_assoc($result)) {
      $subscription_id = $row["id"];
      $deleteSubscribers = "DELETE from subscribers WHERE subscription_id = $subscription_id;";
      if (!$conn->query($deleteSubscribers) || !$conn->query($deleteSubscriptions)){
        echo "Error deleting record: " . $conn->error;
        exit();
      }
  }
  echo "Records deleted successfully!";
