<?php
  include_once 'header.php';
?>

  <!--  <section >
      <?php
      if(isset($_SESSION["useruid"])){
        echo "<p> Hello there " .$_SESSION["useruid"] . "</p>";

      }
      ?>
    
      <h1> This is an Introduction</h1>
      <p> Here is an important paragraph that explain the purpose of the website </p>
    </section> -->

    <div class = "container__intro">
        <div class = "container__text-box">
            <h1 class = "heading-primary">
              <span class = "heading-primary--main">remindU </span>
              <span class = "heading-primary--sub">The best place where you can keep track on your subscriptions!</span>
              <a href="signup.php" class="btn">Sign up for more information &#9652</a>
            </h1>
        </div>
    </div>
<?php
  include_once 'footer.php';
?>
