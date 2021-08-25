var emailFriend  = document.getElementById('emailFriend');
var add_more_fields = document.getElementById('add_more_fields');
var remove_fields = document.getElementById('remove_fields');

add_more_fields.onclick = function(){
	var newField = document.createElement('input');
	newField.setAttribute('type', 'text');
	newField.setAttribute('name', 'emailFriend');
	newField.setAttribute('class', 'form__control');
	newField.setAttribute('placeholder', 'Another Friend E-mail');
	emailFriend.appendChild(newField);
}

remove_fields.onclick = function() {
	var input_tags = emailFriend.getElementsByTagName('input');
	if(input_tags.length >1) {
		emailFriend.removeChild(input_tags[(input_tags.length) - 1]);
	}
}
