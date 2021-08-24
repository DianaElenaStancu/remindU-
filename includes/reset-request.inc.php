<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'dbh.inc.php';

if (isset($_POST["reset-request-submit"])) {

  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url = "http://localhost/remindU/remindU-/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

  $expires = date("U") + 1800;

  $userEmail = $_POST["email"];

  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error1!";
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
  }

  $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error2!";
    exit();
  }
  else{
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close();

  /*$to = $userEmail;

  $subject = 'Reset your password from mmtuts';

  $message = '<p> We received a password reset request. The link to reset you password is bellow. if you did not make this request you can ignore this email </p>
              <p> Here is you password reset link:
              <a href ="' .$url . '"> ' . $url . '</a></p>';

  $headers = "From: mmtuts <usemmtuts@gmail.com>\r\n";
  $headers .="Reply-To: usemmtuts@gmail.com\r\n";
  $headers .= "Content-type: text/html\r\n";

  mail($to, $subject, $message, $headers);*/

  //include requires phpmailer filesize
  require 'PHPMailer.php';
  require 'SMTP.php';
  require 'Exception.php';
  //define name spaces


  //create instance of phpmailer
  $mail = new PHPMailer();
  //set mailer to use ocistatementtype
  $mail -> isSMTP();
  //define smtp gethostname
  $mail -> Host = "smtp.gmail.com";
  //enable smtp authentication
  $mail -> SMTPAuth = "true";
  //set type of encryption (ssl/tls)
  $mail -> SMTPSecure = "tls";
  //set port to connect SMTP
  $mail -> Port = "587";
  //set gmail username
  $mail -> Username = "remindu2021@gmail.com";
  //set gmail password
  $mail -> Password = "";
  //set email subject
  $mail -> Subject = "no-reply Reset password";
  //set sender email
  $mail -> setFrom ("remindu2021@gmail.com");
  //email body
  $mail -> Body = '<p> We received a password reset request. The link to reset you password is bellow. if you did not make this request you can ignore this email </p>
              <p> Here is you password reset link:
              <a href ="' .$url . '"> ' . $url . '</a></p>';
  //add recipient
  $mail -> addAddress($userEmail);//"remindu2021@gmail.com"
  //finally send email
  if ($mail -> Send()) {
    echo "Email sent!";
  }
  else{
    echo "error";
  }
  $mail -> smtpClose();

  header("Location: ../reset-password.php?reset=success");



}
else{
  header("location: ../index.php");
}
