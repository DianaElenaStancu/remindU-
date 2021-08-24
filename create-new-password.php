<?php
  include_once 'header.php';
?>

    <div class= "container__form">

        <?php
          $selector = $_GET["selector"];
          $validator = $_GET["validator"];

          if (empty($selector) || empty($validator)) {
            echo "Could not validate your request!";
          }
          else{
            if (ctype_xdigit($selector) === true && ctype_xdigit($validator) === true)//validate hex dec format
            {
          ?>

              <form action = "includes/reset-password.inc.php" method = "post">
                <input type = "hidden" name = "selector" value = "<?php echo $selector ?>">
                <input type = "hidden" name = "validator" value = "<?php echo $validator ?>">
                <input type = "password" name="pwd" placeholder = "Enter a new password...">
                <input type = "password" name="pwd-repeat" placeholder = "Repeat new password...">
                <button type = "submit" name = "reset-password-submit">Reset password</button>
              </form>

              <?php
            }
          }
         ?>

    </div>


<?php
  include_once 'footer.php';
?>
