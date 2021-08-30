<?php
   include_once 'header.php';
   ?>
   <script>
    $(document).ready(function(){
      SignUp();
    });
   </script>
<div class = "container__form">
   <h2 class = "heading-secondary">Sign up</h2>
   <div class = "row justify-content-md-center">
      <form action="includes/signup.inc.php" method="post">
         <div class = "form__group">
            <!--  <label for="FullName" class = "form__label"> Full name </label> --> <!---->
            <input type="text" class = "form__control" id = "fullname" name="name" placeholder="Enter Full name..." aria-describedby="NameHelp">
         </div>
         <div class = "form__group">
            <!--<label for="email" class = "form__label"> Email </label>-->
            <input type="email" class = "form__control" id = "email" name="email" placeholder="Enter Email..." aria-describedby="EmailHelp">
         </div>
         <div class = "form__group">
            <!--<label for="Username" class = "form__label"> Username </label>-->
            <input type="text" class = "form__control" id = "username" name="username" placeholder="Enter Username..." aria-describedby="UsernameHelp">
         </div>
         <div class = "form__group">
            <!--  <label for="Password" class = "form__label"> Password </label>-->
            <input type="password" class = "form__control" id = "password" name="pwd" placeholder="Enter Password..." aria-describedby="PasswordHelp">
         </div>
         <div class = "form__group">
            <!--  <label for="RepeatPassword" class = "form__label"> Repeat Password </label>-->
            <input type="password"  class = "form__control" id = "repeatPassword" name="pwdRepeat" placeholder="Repeat password..." aria-describedby="PasswordHelp">
         </div>
         <button type="submit" name="submit" class="btn btn-block mybtn btn-primary tx-tfm">Sign up</button>
         <div class = "form-message"></div>
      </form>
   </div>

</div>
<?php
   include_once 'footer.php';
   ?>
