<?php
  include_once 'header.php';
?>
  <script>
    $(document).ready(function(){
     logIn();
   });
</script>
    <div class= "container__form">
      <h2 class = "heading-secondary">Log in</h2>
      <div class = "row justify-content-md-center">
        <form action="includes/login.inc.php" method="post" id = "loginForm">
          <div  class = "form__group">
            <label for="InputUid" class = "form__label">Username/Email </label>
            <input type="text" class = "form__control" id = "username" name="username" placeholder="Username/Email..." aria-describedby="UidHelp">
          </div>
          <div class = "form__group">
            <label for="InputPwd" class = "form__label">Password</label>
            <input type="password" class = "form__control" name="pwd" placeholder="Password..." id = "password">
          </div>
            <button type="submit" id = "submit" class = "btn btn-block mybtn btn-primary tx-tfm" name="submit">Log In</button>
        </form>
        <a href = "reset-password.php">Forgot your password?</a>
      </div>
      <div class = "form-message"></div>
    </div>


<?php
  include_once 'footer.php';
?>
