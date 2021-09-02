<?php
$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["username"];
$pwd = $_POST["pwd"];
$pwdRepeat = $_POST["pwdRepeat"];
$error = false;
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
    echo "<p class=\"alert alert-danger\" role=\"alert\">Fill in al fields!</p>";
    $error = true;
} elseif (validUid($username) !== false) {
    echo "<p class=\"alert alert-danger\" role=\"alert\">Choose a proper username!</p>";
    $error = true;
} elseif (validEmail($email) !== false) {
    echo "<p class=\"alert alert-danger\" role=\"alert\">Choose a proper email!</p>";
    $error = true;
} elseif (pwdMatch($pwd, $pwdRepeat) !== false) {
    echo "<p class=\"alert alert-danger\" role=\"alert\">Passwords does not match!</p>";
    $error = true;
} elseif (uidExists($conn, $username, $email) !== false) {
    echo "<p class=\"alert alert-danger\" role=\"alert\">Username/E-mail already taken!</p>";
    $error = true;
}
if ($error === false) echo createUser($conn, $name, $email, $username, $pwd);
?>
