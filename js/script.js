var emailFriend  = document.getElementById('FriendEmail');
var nameFriend = document.getElementById('FriendName');
var add_more_fields = document.getElementById('add_more_fields');
var remove_fields = document.getElementById('remove_fields');

add_more_fields.onclick = function(){
	var newField2 = document.createElement('input');
	newField2.setAttribute('type', 'text');
	newField2.setAttribute('name', 'FriendName[]');
	newField2.setAttribute('class', 'form__control');
	newField2.setAttribute('placeholder', 'Another Friend Name');
	var newField1 = document.createElement('input');
	newField1.setAttribute('type', 'text');
	newField1.setAttribute('name', 'FriendEmail[]');
	newField1.setAttribute('class', 'form__control');
	newField1.setAttribute('placeholder', 'Another Friend E-mail');

	nameFriend.appendChild(newField1);
	emailFriend.appendChild(newField2);
}

remove_fields.onclick = function() {
	var input_tags1 = emailFriend.getElementsByTagName('input');
	var input_tags2 = nameFriend.getElementsByTagName('input');

	if(input_tags1.length > 1) {
		emailFriend.removeChild(input_tags1[(input_tags1.length) - 1]);
		nameFriend.removeChild(input_tags2[(input_tags2.length) - 1]);
	}
}
