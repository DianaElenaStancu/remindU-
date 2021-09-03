<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    return (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat));
}
function validUid($username) {
    return preg_match("/^[a-zA-Z0-9]*$/", $username);
}
function validEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function pwdMatch($pwd, $pwdRepeat) {
    return ($pwd === $pwdRepeat);
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
  if($row = mysqli_fetch_assoc($resultData)){
    $result = $row;
  }else
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
  return (empty($username) || empty($pwd));
}
function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);
    if ($uidExists === false) {
      echo "<p class=\"alert alert-danger\" role=\"alert\">Incorrect username/e-mail!</p>";
      exit();
    }
    $pwdHashed = $uidExists['usersPwd'];
    $checkPwd = password_verify($pwd, $pwdHashed);
    if ($checkPwd === false) {
        echo "<p class=\"alert alert-danger\" role=\"alert\">Incorrect password!</p>";
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        echo "<p class=\"alert alert-success\" role=\"alert\">Logged in successfully!</p>";
    }
}
function createSubscription($stmt, $conn, $user_id, $subscription_name, $date) {
    $sql = "INSERT INTO subscriptions (user_id, name, date) VALUES (?, ?, ?);";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }
    mysqli_stmt_bind_param($stmt, "sss", $user_id, $subscription_name, $date);
    mysqli_stmt_execute($stmt);
    return true;
}
function createSubscriber($stmt, $conn, $subscription_id, $name, $email) {
    $sql = "INSERT INTO subscribers (subscription_id, name, email) VALUES (?, ?, ?);";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $subscription_id, $name, $email);
    mysqli_stmt_execute($stmt);
    return true;
}
function getSubscriptionId($stmt) {
    $sql = "SELECT * FROM subscriptions ORDER BY id DESC LIMIT 1;";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row["id"];
    }
}
function emptyInputNewSubscription($subscription, $date, $friendName, $friendEmail, $subscribers) {
    $result = false;
    if($subscribers)
    for ($id = 0;$id < count($friendName);$id++)
      if (empty($friendEmail[$id]) || empty($friendName[$id]))
        $result = true;
    if (empty($subscription) || empty($date)) {
        $result = true;
    }
    return $result;
}
