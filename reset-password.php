<?php
  include_once 'header.php';
?>

    <div class= "container__form">
      <h2 class = "heading-secondary">Reset your password</h2>
      <p>An e-mail will be send to you with instructions on how to reset your password.</p>
      <div class = "row justify-content-md-center">
        <form action="includes/reset-request.inc.php" method="post">
          <div  class = "form__group">
            <label for="InputUid" class = "form__label">Enter your e-mail adress </label>
            <input type="text" class = "form__control" id = "InputEmail" name="email" placeholder="Email..." aria-describedby="EmailHelp">
          </div>
          <button type="submit" class = "btn btn-block mybtn btn-primary tx-tfm" name="reset-request-submit">Receive new password</button>
        </form>
        <?php
          if(isset($_GET["reset"])){
            echo'<p>Check your e-mail!</p>';
          }
         ?>
      </div>
    </div>


<?php
  include_once 'footer.php';
?>
