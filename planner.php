<?php
   include_once 'header.php';
   ?>
<script>
    $(document).ready(function(){
       ModalAddFriends();
       NewSubscription();
    });
</script>
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
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add new subscription</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id = "close-header"></button>
            </div>
            <form action="includes/new-subscription.inc.php" method = "post" id = "newSubForm">
               <div class="modal-body">
                  <div  class = "form__group">
                     <label for="InputSubscription" class = "form__label">Subscription name </label>
                     <input type="text" class = "form__control" id = "subscription" name="subscription" placeholder="Subscription name..." aria-describedby="SubHelp">
                  </div>
                  <div class = "form__group">
                     <label for="payDay" class = "form__label">When is the pay day:</label>
                     <input type="date" class = "form__control" id="date" name="date" placeholder = "..." aria-describedby = "DayHelp">
                  </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="addFriendsCheckbox">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Do you want to remind your friends too?</label>
                      <div  id = "addFriendInput">
                     </div>
                    </div>
               </div>
               <div class = "form-message"> </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id = "close">Close</button>
                  <button type="submit" name="submit" class="btn btn-block mybtn btn-primary tx-tfm" id = "submit">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<?php
   include_once 'footer.php';
   ?>
