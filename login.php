<?php
  include_once 'header.php';
?>

    <div class= "container-sm">
      <h2>Log in</h2>
      <div>
        <form action="includes/login.inc.php" method="post">
          <div class="mb-3">
            <label for="InputUid" class = "form-label">Username/Email </label>
            <input type="text" class = "form-control" id = "InputUid" name="uid" placeholder="Username/Email..." aria-describedby="UidHekp">
          </div>
          <div class = "mb-3">
            <label for="InputPwd" class = "form-label">Password</label>
            <input type="password" class = "form-control" name="pwd" placeholder="Password..." id = "InputPwd">
          </div>
            <button type="submit" class = "btn btn-primary" name="submit">Log In</button>
        </form>
      </div>
      <?php
        if(isset($_GET["error"])){
          if($_GET["error"] == "emptyinput"){
            echo '<p>Fill in al fields!</p>';
          }
          else if($_GET["error"] == "wronglogin"){
            echo '<p>Incorrent login information!</p>';
          }
        }
       ?>
    </div>


<?php
  include_once 'footer.php';
?>
