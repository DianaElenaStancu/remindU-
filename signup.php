<?php
  include_once 'header.php';
?>

    <div class = "container-sm">
      <h2>Sign up</h2>
      <div class = "row">
        <form action="includes/signup.inc.php" method="post">
          <div class = "mb-3">
              <label for="FullName" class = "form-label"> Full name </label>
              <input type="text" class = "form-control" id = "FullName" name="name" placeholder="Full name..." aria-describedby="NameHelp">
          </div>
          <div class = "mb-3">
            <label for="email" class = "form-label"> Email </label>
            <input type="email" class = "form-control" id = "Email" name="email" placeholder="Email..." aria-describedby="EmailHelp">
          </div>
          <div class = "mb-3">
            <label for="Username" class = "form-label"> Username </label>
            <input type="text" class = "form-control" id = "Username" name="uid" placeholder="Username..." aria-describedby="UsernameHelp">
          </div>
          <div class = "mb-3">
            <label for="Password" class = "form-label"> Password </label>
            <input type="password" class = "form-control" id = "Password" name="pwd" placeholder="Password..." aria-describedby="PasswordHelp">
          </div>
          <div class = "mb-3">
            <label for="RepeatPassword" class = "form-label"> Repeat Password </label>
            <input type="password"  class = "form-control" id = "RepeatPassword" name="pwdRepeat" placeholder="Repeat password..." aria-describedby="PasswordHelp">
          </div>



          <button type="submit" name="submit" class="btn btn-primary">Sign up</button>
        </form>
      </div>
      <?php
        if(isset($_GET["error"])){
          if($_GET["error"] == "emptyinput"){
            echo '<p>Fill in al fields!</p>';
          }
          else if($_GET["error"] == "invaliduid"){
            echo '<p>Choose a proper username!</p>';
          }
          else if($_GET["error"] == "invalidemail"){
            echo '<p>Choose a proper email!</p>';
          }
          else if($_GET["error"] == "pwdsdontmatch"){
            echo '<p>Passwords does not match!</p>';
          }
          else if($_GET["error"] == "stmtfailed"){
            echo '<p>Something went wrong!</p>';
          }
          else if($_GET["error"] == "usernametaken"){
            echo '<p>Username already taken!</p>';
          }
          else if($_GET["error"] == "none"){
            echo '<p>You have signed up!</p>';
          }
        }
       ?>
    </div>




<?php
  include_once 'footer.php';
?>
