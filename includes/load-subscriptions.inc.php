<?php
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  session_start();
  $subscriptions = array();
  $user_id =  $_SESSION['userid'];
  $select_subscriptions = "SELECT * FROM subscriptions WHERE user_id = $user_id";
  $result_subscriptions = mysqli_query($conn, $select_subscriptions);
  if(mysqli_num_rows($result_subscriptions) > 0){
    while($row_subscriptions = mysqli_fetch_assoc($result_subscriptions)){
      $subscription['name'] = $row_subscriptions['name'];
      $subscription['date'] = $row_subscriptions['date'];
      $subscription['id'] = $row_subscriptions['id'];
      $id = $subscription['id'];
      $select_subcribers = "SELECT * FROM subscribers WHERE subscription_id = $id";
      $result_subscribers = mysqli_query($conn, $select_subcribers);
      $subscription['subscribers'] = array();
      if(mysqli_num_rows($result_subscribers) > 0){
        while($row_subscribers = mysqli_fetch_assoc($result_subscribers)){
          $subscriber['name'] = $row_subscribers['name'];
          $subscriber['email'] = $row_subscribers['email'];
          array_push($subscription['subscribers'], $subscriber);
        }
      }
      array_push($subscriptions, $subscription);
    }
    echo json_encode($subscriptions);
  }else{
    $subscriptions = "There are no subscriptions yet &#9785;.";
    echo json_encode($subscriptions);
  }
