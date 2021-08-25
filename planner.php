<?php
   include_once 'header.php';
   ?>
<section>
   <?php
      if(isset($_SESSION["useruid"])){
        echo "<p> Hello there " .$_SESSION["useruid"] . "!</p>";

      }
      ?>
   <p> Here are your subscriptions! </p>
   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Add new subscriptions
   </button>
   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="/action_page.php" method = "post">
                  <div  class = "form__group">
                     <label for="InputSubscription" class = "form__label">Subscription name </label>
                     <input type="text" class = "form__control" id = "InputSubscription" name="subscription" placeholder="Subscription name..." aria-describedby="SubHelp">
                  </div>
                  <div class = "form__group">
                     <label for="payDay" class = "form__label">When is the pay day:</label>
                     <input type="date" class = "form__control" id="InputPayDay" name="payDay" placeholder = "..." aria-describedby = "DayHelp">
                  </div>
                  <div  class = "form__group" id="emailFriend">
                     <label for="emailFriend" class = "form__label">Your friends' email(s):</label>
                     <input type = "text"  class = "form__control" id = "InputEmail" name="emailFriend" placeholder = "Friend E-mail" aria-describedby = "EmailHelp">
                  </div>
                  <div class = "controls">
                     <button href="#" type="button" class="btn btn-primary" id = "add_more_fields"> Add more </button>
                     <button href="#" type="button" class="btn btn-primary" id = "remove_fields"> Remove field </button>
                  </div>
               </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary">Submit</button>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
   include_once 'footer.php';
   ?>
