<?php
  include_once 'header.php';
?>

    <div class = "container__form">
      <h2 class = "heading-secondary">Sign up</h2>
      <div class = "row justify-content-md-center">
        <form action="includes/signup.inc.php" method="post">
          <div class = "form__group">
            <!--  <label for="FullName" class = "form__label"> Full name </label> --> <!---->
            <input type="text" class = "form__control" id = "FullName" name="name" placeholder="Enter Full name..." aria-describedby="NameHelp">
          </div>
          <div class = "form__group">
            <!--<label for="email" class = "form__label"> Email </label>-->
            <input type="email" class = "form__control" id = "Email" name="email" placeholder="Enter Email..." aria-describedby="EmailHelp">
          </div>
          <div class = "form__group">
            <!--<label for="Username" class = "form__label"> Username </label>-->
            <input type="text" class = "form__control" id = "Username" name="uid" placeholder="Enter Username..." aria-describedby="UsernameHelp">
          </div>
          <div class = "form__group">
            <!--  <label for="Password" class = "form__label"> Password </label>-->
            <input type="password" class = "form__control" id = "Password" name="pwd" placeholder="Enter Password..." aria-describedby="PasswordHelp">
          </div>
          <div class = "form__group">
            <!--  <label for="RepeatPassword" class = "form__label"> Repeat Password </label>-->
            <input type="password"  class = "form__control" id = "RepeatPassword" name="pwdRepeat" placeholder="Repeat password..." aria-describedby="PasswordHelp">
          </div>
          <button type="submit" name="submit" class="btn btn-block mybtn btn-primary tx-tfm">Sign up</button>
        </form>
      </div>
      <?php
        if(isset($_GET["error"])){
          if($_GET["error"] == "emptyinput"){
            echo '<p class="alert alert-primary" role="alert">Fill in al fields!</p>';
          }
          else if($_GET["error"] == "invaliduid"){
            echo '<p class="alert alert-primary" role="alert">Choose a proper username!</p>';
          }
          else if($_GET["error"] == "invalidemail"){
            echo '<p class="alert alert-primary" role="alert">Choose a proper email!</p>';
          }
          else if($_GET["error"] == "pwdsdontmatch"){
            echo '<p class="alert alert-primary" role="alert">Passwords does not match!</p>';
          }
          else if($_GET["error"] == "stmtfailed"){
            echo '<p class="alert alert-primary" role="alert">Something went wrong!</p>';
          }
          else if($_GET["error"] == "usernametaken"){
            echo '<p class="alert alert-primary" role="alert">Username already taken!</p>';
          }
          else if($_GET["error"] == "none"){
            echo '<p class="alert alert-primary" role="alert">You have signed up!</p>';
          }
        }
       ?>
    </div>




<?php
  include_once 'footer.php';
?>
