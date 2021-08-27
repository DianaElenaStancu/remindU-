<?php
  if(isset($_POST["submit"])){
    $subscription_name = $_POST["subscription"];
    $date = $_POST["payDay"];
    $friendEmail = $_POST['FriendEmail'];
    $friendName = $_POST['FriendName'];


    echo $subscription_name."<br>";
    echo $date."<br>";
    foreach($friendEmail as $email){
      echo $email."<br>";
    }
    foreach($friendName as $name){
      echo $name."<br>";
    }
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


  //  createSubscription($conn, $subscription_name, $date, $friendEmail, $friendName);
  }
  else{
    header("location: ../planner.php");
    exit();
  }
