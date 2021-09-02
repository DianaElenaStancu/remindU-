function SignUp() {
    console.log("signup page");
    $("form").submit(function(event) {
        event.preventDefault(); //disable the action and the method
        var name = $("#fullname").val();
        var email = $("#email").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var repeatpassword = $("#repeatPassword").val();
        var resultDropdown = $("div").siblings(".form-message");

        $.post("includes/signup.inc.php", {
            name: name,
            email: email,
            username: username,
            pwd: password,
            pwdRepeat: repeatpassword
        }).done(function(data) {
            resultDropdown.html(data);
            if (data === "<p class=\"alert alert-success\" role=\"alert\">Signed up successfully!</p>")
                $('#signupForm').each(function() {
                    this.reset();
                });
        });
    });
}

function LogIn() {
    console.log("login page");
    $("form").submit(function(event) {
      event.preventDefault(); //disable the action and the method
      var username = $("#username").val();
      var password = $("#password").val();
      var resultDropdown = $("div").siblings(".form-message");

      $.post("includes/login.inc.php", {
          username: username,
          pwd: password,
      }).done(function(data) {
        console.log(data);
        if(data === "<p class=\"alert alert-success\" role=\"alert\">Logged in successfully!</p>"){
          window.location = "planner.php";
        }
        else
          resultDropdown.html(data);
      });
    });
}

function NewSubscription() {
    $("form").submit(function(event) {
      console.log("newsub");
      event.preventDefault(); //disable the action and the method
      var subscription = $("#subscription").val();
      var date = $("#date").val();
      var friendName = [];
      var friendEmail = [];
      $("input").each(function(index, elem){
        if(this.name == "FriendName[]")
          friendName.push(elem.value);
        else if(this.name == "FriendEmail[]")
          friendEmail.push(elem.value);
      });
      var resultDropdown = $("div").siblings(".form-message");

      $.post("includes/new-subscription.inc.php", {
          subscription: subscription,
          date: date,
          friendName: friendName,
          friendEmail: friendEmail
      }).done(function(data) {
        console.log(data);
        resultDropdown.html(data);
      });
    });
}

function ModalAddFriends() {
    console.log("planner page");
    $("#addFriendsCheckbox").click(function() {
        if ($('#addFriendsCheckbox').prop('checked')) {
            console.log('checked');
            var lastField = $("#addFriendInput div:last");
            var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
            var fieldWrapper = $("<div class=\"input-group mg-sm\" id=\"addFriendInput" + intId + "\"/>");
            fieldWrapper.data("idx", intId);
            var fName = $("<input type=\"text\" class=\"form__control\" id = \"friendName\" name=\"FriendName[]\" placeholder = \"Friend Name\" aria-describedby = \"FriendNameHelp\" />");
            var fEmail = $("<input type=\"text\" class=\"form__control\" id = \"friendEmail\" name=\"FriendEmail[]\" placeholder = \"Friend E-mail\" aria-describedby = \"EmailHelp\" />");
            var removeButton = $("<input type=\"button\" class=\"btn btn-danger\" id = \"remove_fields\" value=\"&#9587;\" />");
            var addButton = $("<input type=\"button\" class=\"btn btn-success\" id = \"add_more_fields\" value=\"&#9547;\" />");

            removeButton.click(function() {
                $(this).parent().remove();
                $('#addFriendsCheckbox').prop('checked', false);
            });

            addButton.click(function() {
                console.log("adauga");
                var lastField = $("#addFriendInput div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"input-group mg-sm\" id=\"addFriendInput" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input type=\"text\" class=\"form__control\" id = \"friendName\" name=\"FriendName[]\" placeholder = \"Friend Name\" aria-describedby = \"FriendNameHelp\" />");
                var fEmail = $("<input type=\"text\" class=\"form__control\" id = \"friendEmail\" name=\"FriendEmail[]\" placeholder = \"Friend E-mail\" aria-describedby = \"EmailHelp\" />");
                var removeButton = $("<input type=\"button\" class=\"btn btn-danger\" id = \"remove_fields\" value=\"&#9587;\" />");
                fieldWrapper.append(fName);
                fieldWrapper.append(fEmail);
                fieldWrapper.append(removeButton);
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                $("#addFriendInput").append(fieldWrapper);
            });

            fieldWrapper.append(fName);
            fieldWrapper.append(fEmail);
            fieldWrapper.append(removeButton);
            fieldWrapper.append(addButton);
            $("#addFriendInput").append(fieldWrapper);
        } else {
            console.log('unchecked');
            $('div.input-group').remove();
        }
    });
}
