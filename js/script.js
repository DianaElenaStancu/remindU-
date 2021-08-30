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

function ModalAddFriends() {
    console.log("planner page");
    $("#AddFriendsCheckbox").click(function() {
        if ($('#AddFriendsCheckbox').prop('checked')) {
            console.log('checked');
            var lastField = $("#AddFriendInput div:last");
            var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
            var fieldWrapper = $("<div class=\"input-group mg-sm\" id=\"AddFriendInput" + intId + "\"/>");
            fieldWrapper.data("idx", intId);
            var fName = $("<input type=\"text\" class=\"form__control\" id = \"InputFriendName\" name=\"FriendName[]\" placeholder = \"Friend Name\" aria-describedby = \"FriendNameHelp\" />");
            var fEmail = $("<input type=\"text\" class=\"form__control\" id = \"InputEmail\" name=\"FriendEmail[]\" placeholder = \"Friend E-mail\" aria-describedby = \"EmailHelp\" />");
            var removeButton = $("<input type=\"button\" class=\"btn btn-danger\" id = \"remove_fields\" value=\"&#9587;\" />");
            var addButton = $("<input type=\"button\" class=\"btn btn-success\" id = \"add_more_fields\" value=\"&#9547;\" />");

            removeButton.click(function() {
                $(this).parent().remove();
                $('#AddFriendsCheckbox').prop('checked', false);
            });

            addButton.click(function() {
                console.log("adauga");
                var lastField = $("#AddFriendInput div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"input-group mg-sm\" id=\"AddFriendInput" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<input type=\"text\" class=\"form__control\" id = \"InputFriendName\" name=\"FriendName[]\" placeholder = \"Friend Name\" aria-describedby = \"FriendNameHelp\" />");
                var fEmail = $("<input type=\"text\" class=\"form__control\" id = \"InputEmail\" name=\"FriendEmail[]\" placeholder = \"Friend E-mail\" aria-describedby = \"EmailHelp\" />");
                var removeButton = $("<input type=\"button\" class=\"btn btn-danger\" id = \"remove_fields\" value=\"&#9587;\" />");
                fieldWrapper.append(fName);
                fieldWrapper.append(fEmail);
                fieldWrapper.append(removeButton);
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                $("#AddFriendInput").append(fieldWrapper);
            });

            fieldWrapper.append(fName);
            fieldWrapper.append(fEmail);
            fieldWrapper.append(removeButton);
            fieldWrapper.append(addButton);
            $("#AddFriendInput").append(fieldWrapper);
        } else {
            console.log('unchecked');
            $('div.input-group').remove();
        }
    });
}
