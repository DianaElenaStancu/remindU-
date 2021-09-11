<?php
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  session_start();
  $subscription_id = $_POST['subscription_id'];
  $user_id =  $_SESSION['userid'];
  deleteSubscription($user_id, $subscription_id, $conn);
