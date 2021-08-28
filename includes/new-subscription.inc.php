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


    echo $subscription_name."<br>";
    echo $date."<br>";
  /*  foreach($friendEmail as $email){
      echo $email."<br>";
    }
    foreach($friendName as $name){
      echo $name."<br>";
    }*/
    echo $friendName[0]."<br>";
    echo $friendEmail[0]."<br>";

    createSubscription($conn, $user_id, $subscription_name, $date, $friendName, $friendEmail);
    createSubscriber($conn, $friendName, $friendEmail);
  }
  else{
    header("location: ../planner.php");
    exit();
  }
