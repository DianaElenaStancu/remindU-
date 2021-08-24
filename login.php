<?php
  include_once 'header.php';
?>

    <div class= "container__form">
      <h2 class = "heading-secondary">Log in</h2>
      <div class = "row justify-content-md-center">
        <form action="includes/login.inc.php" method="post">
          <div  class = "form__group">
            <label for="InputUid" class = "form__label">Username/Email </label>
            <input type="text" class = "form__control" id = "InputUid" name="uid" placeholder="Username/Email..." aria-describedby="UidHekp">
          </div>
          <div class = "form__group">
            <label for="InputPwd" class = "form__label">Password</label>
            <input type="password" class = "form__control" name="pwd" placeholder="Password..." id = "InputPwd">
          </div>
            <button type="submit" class = "btn btn-block mybtn btn-primary tx-tfm" name="submit">Log In</button>
        </form>

        <?php
          if(isset($_GET["newpwd"])){
            if($_GET["newpwd"] == "passwordupdated"){
              echo '<p class="alert alert-primary" role="alert">Your password has been reset!</p>';
            }
          }
         ?>
        <a href = "reset-password.php">Forgot your password?</a>
      </div>
      <?php
        if(isset($_GET["error"])){
          if($_GET["error"] == "emptyinput"){
            echo '<p class="alert alert-primary" role="alert">Fill in al fields!</p>';
          }
          else if($_GET["error"] == "wronglogin"){
            echo '<p class="alert alert-primary" role="alert">Incorrect login information!</p>';
          }
        }
       ?>
    </div>


<?php
  include_once 'footer.php';
?>
