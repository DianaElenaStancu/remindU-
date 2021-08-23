<?php
  include_once 'header.php';
?>
<section >
    <?php
    if(isset($_SESSION["useruid"])){
      echo "<p> Hello there " .$_SESSION["useruid"] . "</p>";

    }
    ?>
    <h1 class = "heading-primary"> Here is your planner</h1>
  </section>
  <?php
      include_once 'footer.php';
  ?>
