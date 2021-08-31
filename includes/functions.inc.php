<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    return (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat));
}
function validUid($username) {
    return !preg_match("/^[a-zA-Z0-9]*$/", $username);
}
function validEmail($email) {
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}
function pwdMatch($pwd, $pwdRepeat) {
    return ($pwd !== $pwdRepeat);
}
function uidExists($conn, $username, $email) {
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    return true;
    exit();
  }
  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  if($row = mysqli_fetch_assoc($resultData))
    $result = true;
  else
    $result = false;
  mysqli_stmt_close($stmt);
  return $result;
}
function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return "<p class=\"alert alert-danger\" role=\"alert\">Something went wrong! Please try again.</p>";
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return "<p class=\"alert alert-success\" role=\"alert\">Signed up successfully!</p>";
}
function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function loginUser($conn, $username, $pwd) {
    print_r($conn);
    print_r($username);
    print_r($pwd);
    $uidExists = uidExists($conn, $username, $username);
    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../planner.php");
        exit();
    }
}
function createSubscription($stmt, $conn, $user_id, $subscription_name, $date) {
    $sql = "INSERT INTO subscriptions (user_id, name, date) VALUES (?, ?, ?);";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../planner.php?error=stmt_failed_subscription");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $user_id, $subscription_name, $date);
    mysqli_stmt_execute($stmt);
    header("location: ../planner.php?error=none");
}
function createSubscriber($stmt, $conn, $subscription_id, $name, $email) {
    $sql = "INSERT INTO subscribers (subscription_id, name, email) VALUES (?, ?, ?);";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../planner.php?error=stmt_failed_subscriber");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $subscription_id, $name, $email);
    mysqli_stmt_execute($stmt);
    header("location: ../planner.php?error=none");
}
function getSubscriptionId($stmt) {
    $sql = "SELECT * FROM subscriptions ORDER BY id DESC LIMIT 1;";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmt_failed_subscriptionId");
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row["id"];
    } else {
        return -1;
    }
}
function emptyInputNewSubscription($subscription_name, $date, $friendName, $friendEmail) {
    $result = false;
    for ($id = 0;$id < count($friendName);$id++)
      if (empty(friendEmail[$id]) || empty(friendName[$id]))
        $result = true;
    if (empty($subscription_name) || empty($date)) {
        $result = true;
    }
    return $result;
}
